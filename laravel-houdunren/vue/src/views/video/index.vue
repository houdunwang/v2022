<script setup lang="ts">
import VideoItem from '@/components/video-item.vue'

const { collection, getAll } = useVideo()

await getAll()
</script>

<template>
  <main class="" v-if="collection?.data.length">
    <HdCard>
      <template #header> 最近更新 </template>
      <VideoItem v-for="video of collection.data" :key="video.id" :video="video" />
    </HdCard>

    <HdPagination
      :per_page="collection?.meta.per_page"
      :total="collection?.meta.total"
      @currentChange="$router.push({ name: 'video.index', query: { page: $event } })" />
  </main>
</template>

<style lang="scss"></style>
