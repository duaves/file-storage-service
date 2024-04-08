<template>
    <div class="flex justify-center items-center h-screen bg-gradient-to-r from-blue-500 to-blue-600">
        <div class="w-1/3 bg-white rounded-lg p-6 flex flex-col drop-shadow-xl">
            <router-link to="/files" class="flex justify-center self-start mb-10">
                <ArrowLeftIcon class="h-6 w-6 text-xl " />Назад
              </router-link>
            <input type="text" placeholder="Название файла"
                class="w-full border-gray-300 border rounded-lg px-3 py-2 mb-4 focus:outline-none focus:ring focus:border-blue-500">
            <div class="mb-4">
                <form>
                    <label class="block">
                        <span class="sr-only">Выберите файл</span>
                        <input type="file"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700" />
                    </label>
                </form>
            </div>
            <button
                class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300 self-end">Добавить</button>
        </div>
    </div>
</template>

<script setup>

import { ArrowLeftIcon } from '@heroicons/vue/24/outline'

</script>

<style scoped>
</style>