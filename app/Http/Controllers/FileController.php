<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Http\Resources\FileListResource;
use App\Http\Resources\FileResource;
use App\Models\File;
use Illuminate\Http\Request;

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
        return new FileResource(File::create($request->validate()));
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
}
