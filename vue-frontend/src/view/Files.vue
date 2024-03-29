<template>
  <div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
    <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
      aria-hidden="true">
      <div
        class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" />
    </div>
    <ul role="list" class="divide-y divide-gray-100">
    <li v-for="file in files" :key="file.email" class="flex justify-between gap-x-6 py-5">
      <div class="flex min-w-0 gap-x-4">
        <img class="h-12 w-12 flex-none rounded-full bg-gray-50" :src="file.imageUrl" alt="" />
        <div class="min-w-0 flex-auto">
          <p class="text-sm font-semibold leading-6 text-gray-900">{{ file.name }}</p>
          <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ file.email }}</p>
        </div>
      </div>
      <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
        <p class="text-sm leading-6 text-gray-900">{{ file.role }}</p>
        <p v-if="file.lastSeen" class="mt-1 text-xs leading-5 text-gray-500">
          Last seen <time :datetime="file.lastSeenDateTime">{{ file.lastSeen }}</time>
        </p>
        
      </div>
    </li>
  </ul>
    
  </div>
</template>

<script setup>
const files = [
  {
    name: 'file 1',
    imageUrl:
      'https://www.pngitem.com/pimgs/m/335-3354771_file-icon-hd-png-download.png',
    lastSeen: '3h ago',
    lastSeenDateTime: '2023-01-23T13:23Z',
  },
  {
    name: 'file 2',
    imageUrl:
      'https://www.pngitem.com/pimgs/m/335-3354771_file-icon-hd-png-download.png',
    lastSeen: '3h ago',
    lastSeenDateTime: '2023-01-23T13:23Z',
  },
  {
    name: 'file 3',
    imageUrl:
      'https://www.pngitem.com/pimgs/m/335-3354771_file-icon-hd-png-download.png',
      lastSeen: '3h ago',
    lastSeenDateTime: '2023-01-23T13:23Z',
  },
]
</script>