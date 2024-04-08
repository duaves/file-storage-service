<template>
  <div class=" bg-gradient-to-r from-blue-500 to-blue-600 flex flex-col items-center justify-center min-h-screen">
    <div class="bg-white overflow-x-auto max-w-screen-lg mx-auto p-8 rounded-xl drop-shadow-xl m-28">
      <div class="flex justify-between w-full p-1 mb-4">
        <div class="flex flex-grow">
          <input v-model="search" @change="getFiles(null)" type="text" placeholder="Поиск..."
            class=" p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
        </div>
        <router-link to="/add-file">
        <button @click="showModal = true"
          class="flex px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:bg-blue-700"><PlusIcon class="h-6 w-6 text-white mr-2" />Добавить
          файл</button></router-link>
      </div>
      <table class=" min-w-max w-full bg-white border border-gray-300 rounded-lg overflow-hidden ">
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
          <tr v-for="file of files.data">
            <td class="py-3 px-6 text-center">
              <div class="flex justify-center items-center">
                <img :src="file.image" alt="Изображение" class="h-12 w-12 object-cover rounded-full">
              </div>
            </td>
            <td class="py-3 px-6 text-left">{{ file.original_name }}</td>
            <td class="py-3 px-6 text-left">{{ file.extension }}</td>
            <td class="py-3 px-6 text-left">{{ file.size }} MB</td>
            <td class="py-3 px-6 text-center"><a href="#" class="flex justify-center items-center">
                <ArrowDownTrayIcon class="h-6 w-6 text-blue-500 " />
              </a></td>
            <td class="py-3 px-6 text-center"><a href="#" class="flex justify-center items-center">
                <PencilIcon class="h-6 w-6 text-blue-500 " />
              </a></td>
            <td class="py-3 px-6 text-center"><a href="#" class="flex justify-center items-center">
                <TrashIcon class="h-6 w-6 text-blue-500 " />
              </a></td>
          </tr>
        </tbody>
      </table>
      <div class="flex flex-grow justify-between items-center mt-10">
        <div v-if="files.data.length">
          Записи с {{ files.from }} по {{ files.to }}, всего {{ files.total }}
        </div>
        <nav class="relative z-0 inline-flex justify-center rounded-md shadow-sm -space-x-px" aria-label="Pagination">
          <a v-for="(link, i) of files.links" :key="i" :disabled="!link.url" href="#" @click.prevent="getForPage($event, link)"
            aria-current="page"
            class="relative inline-flex items-center px-4 py-2 border text-sm font-medium whitespace-nowrap" :class="[
              link.active
                ? 'z-10 bg-indigo-50 border-blue-500 text-blue-600'
                : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50',
              i === 0 ? 'rounded-l-md' : '',
              i === files.links.length - 1 ? 'rounded-r-md' : '',
              !link.url ? ' bg-gray-100 text-gray-700' : ''
            ]" v-html="link.label">
          </a>
        </nav>
      </div>
    </div>


  </div>

</template>

<script setup>

import { ArrowDownTrayIcon, PencilIcon, TrashIcon, PlusIcon } from '@heroicons/vue/24/outline'
import { computed, onMounted, ref } from 'vue';
import store from '../store/index.js';


const search = ref('')
const files = computed(() => store.state.files)

onMounted(() => {
  getFiles();
})

function getFiles(url = null) {
  store.dispatch('getFiles', {url, search: search.value})
}

function getForPage(ev, link){
  if(!link.url || link.active){
    return
  }
  getFiles(link.url)
}

</script>