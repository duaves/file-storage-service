<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Http\Resources\FileListResource;
use App\Http\Resources\FileResource;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search', false);
        $query = File::query();
        if($search){
            $query->where('original_name', 'like', "%{$search}%")->orWhere('name', 'like', "%{$search}%");
        }
        return FileListResource::collection($query->paginate(50));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FileRequest $request)
    {
        $data = $request -> validated();

        $image = $data['image'] ?? null;

        if($image){
            $relativePath = $this->saveImage($image);
            $data['image'] = URL::to(Storage::url($relativePath));
            $data['image_extension'] = $image->getClientMineType();
            $data['image_size'] = $image -> getSize();
                }

        $file = File::create($data); 

        return new FileResource($file);

    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        return new FileResource($file);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FileRequest $request, File $file)
    {
        $file->update($request->validate());

        return new FileResource($file);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        $file->delete();

        return response()->noContent();
    }


    private function saveImage(UploadedFile $image){
        $path = 'files/' . Str::random();
        if(!Storage::exists(($path))){
            Storage::makeDirectory($path, 0755, true);
        }

        if(!Storage::putFileAs('public/' . $path, $image->getClientOriginalName())){
            throw new \Exception("Невозможно сохранить файл \"{$image->getClientOriginalName()}\"");
        }

        return $path . '/' . $image->getClientOriginalName();
    }
}
