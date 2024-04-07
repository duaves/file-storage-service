<template>
  <div class=" bg-gradient-to-r from-blue-500 to-blue-600 flex flex-col items-center justify-center min-h-screen">
    <div class="bg-white overflow-x-auto max-w-screen-lg mx-auto p-8 rounded-xl drop-shadow-xl">
      <div class="flex justify-between w-full p-1 mb-4">
      <div class="flex flex-grow">
        <input v-model="searchQuery" type="text" placeholder="Поиск..." class=" p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
      </div>
      <button @click="showModal = true" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Добавить файл</button>
    </div>
      <table class="min-w-max w-full bg-white border border-gray-300 rounded-lg overflow-hidden">
        <thead>
          <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">Изображение</th>
            <th class="py-3 px-6 text-left">Название</th>
            <th class="py-3 px-6 text-left">Расширение</th>
            <th class="py-3 px-6 text-left">Размер</th>
            <th class="py-3 px-6 text-left">Скачать</th>
            <th class="py-3 px-6 text-left">Редактировать</th>
            <th class="py-3 px-6 text-left">Удалить</th>
          </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
          <!-- <tr v-for="file in filteredFiles" :key="file.id">
            <td class="py-3 px-6 text-left">
              <img :src="file.image" alt="Изображение" class="h-12 w-12 object-cover rounded-full">
            </td>
            <td class="py-3 px-6 text-left">{{ file.name }}</td>
            <td class="py-3 px-6 text-left">{{ file.extension }}</td>
            <td class="py-3 px-6 text-left">{{ file.size }}</td>
            <td class="py-3 px-6 text-left"></td>
            <td class="py-3 px-6 text-left"></td>
            <td class="py-3 px-6 text-left"></td>
          </tr> -->
          <tr >
            <td class="py-3 px-6 text-center"><div class="flex justify-center items-center">
              <img :src="'https://get.wallhere.com/photo/face-model-portrait-photography-actor-profile-hair-nose-Person-Colton-Haynes-head-man-male-hairstyle-portrait-photography-photo-shoot-close-up-facial-hair-561682.jpg'" alt="Изображение" class="h-12 w-12 object-cover rounded-full"></div>
            </td>
            <td class="py-3 px-6 text-left">file</td>
            <td class="py-3 px-6 text-left">.jpg</td>
            <td class="py-3 px-6 text-left">5 MB</td>
            <td class="py-3 px-6 text-center"><a href="#" class="flex justify-center items-center"><ArrowDownTrayIcon class="h-6 w-6 text-blue-500 " /></a></td>
            <td class="py-3 px-6 text-center"><a href="#" class="flex justify-center items-center"><PencilIcon class="h-6 w-6 text-blue-500 " /></a></td>
            <td class="py-3 px-6 text-center"><a href="#" class="flex justify-center items-center"><TrashIcon class="h-6 w-6 text-blue-500 " /></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>

import {ArrowDownTrayIcon, PencilIcon, TrashIcon} from '@heroicons/vue/24/outline'
  
  

</script>