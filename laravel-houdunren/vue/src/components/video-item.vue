<script setup lang="ts">
import dayjs from 'dayjs'

const { video } = defineProps<{ video: VideoModel }>()
</script>

<template>
  <main class="flex border-b py-4 justify-between items-center hover:bg-slate-200 duration-300 cursor-pointer px-5">
    <RouterLink :to="{ name: 'video.show', params: { id: video.id } }"> {{ video.title }}</RouterLink>
    <div class="flex items-center gap-1 text-sm text-gray-600">
      <icon-history theme="outline" fill="#333" />
      {{ dayjs(video.created_at).format('YYYY/MM/DD') }}
    </div>
  </main>
</template>

<style lang="scss"></style>
