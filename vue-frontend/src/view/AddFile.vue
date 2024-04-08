<template>
  <div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-blue-500 to-blue-600">
    <div class="w-full md:w-2/3 lg:w-1/2 xl:w-1/3 bg-white rounded-lg p-6 flex flex-col shadow-xl">
      <router-link to="/files" class="flex justify-center self-start mb-10">
        <ArrowLeftIcon class="h-6 w-6 text-xl" />Назад
      </router-link>
      <input v-model="file.name" type="text" placeholder="Название файла"
        class="w-full border-gray-300 border rounded-lg px-3 py-2 mb-4 focus:outline-none focus:ring focus:border-blue-500">
      <form @submit.prevent="onSubmit">
        <div class="mb-4">

          <label class="block">
            <span class="sr-only">Выберите файл</span>
            <input type="file" @change="file => file.image = file"
              class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700" />
          </label>

        </div>
        <button type="submit"
          class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300 self-end">Добавить</button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ArrowLeftIcon } from '@heroicons/vue/24/outline'
import { ref, computed, onUpdated } from 'vue';
import store from '../store/index.js';


const props = defineProps({
  modelValue: Boolean,
  file: {
    required: true,
    type: Object,
  }
});

const file = ref({
  name: props.file ? props.file.name : '',
  original_name: props.file ? props.file.original_name : '',
  image: props.file ? props.file.image : null,
})

const emit = defineEmits(['update:modelValue'])

const show = computed({
  get: () => props.modelValue,
  set: (value) => emit('update:modelValue', value)
})

onUpdated(() => {
  if (props.file) {
    file.value = {
      name: props.file.name,
      original_name: props.file.original_name,
      image: props.file.image,
    }
  }
})

function onSubmit() {
  if (file.value.original_name) {
    store.dispatch('updateFile', file.value)
      .then(response => {
        loading.value = false;
        if (response.status === 200) {
          store.dispatch('getFiles')
        }
      })
  } else {
    store.dispatch('createFile', file.value)
      .then(response => {
        if (response.status === 201) {
          store.dispatch('getFiles')
        }
      })
  }

}


</script>

<style scoped></style>