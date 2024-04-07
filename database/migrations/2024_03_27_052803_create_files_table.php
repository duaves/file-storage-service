<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('files', function (Blueprint $table) {
            //id файла
            $table->id();

            // Название файла введенное пользователем
            $table->string('name')->nullable();

            // Оригинальное название файла
            $table->string('original_name');

            // Изображение
            $table->string('image');

            // Расширение файла
            $table->string('extension');

            // Размер файла
            $table->double('size');

            // Временные метки для создания и изменения записей
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
