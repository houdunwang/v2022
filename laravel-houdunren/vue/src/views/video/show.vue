<script setup lang="ts">
import VideoPlayer from '@/components/hd/videoPlayer.vue'
const route = useRoute()
const { find, model } = useVideo()
await find(route.params.id)
</script>

<template>
  <main class="!w-full !-mt-0 !px-0 !py-0" v-if="model">
    <div class="w-screen bg-gray-800">
      <section class="xl:w-page mx-auto"><VideoPlayer :url="model?.path" /></section>
    </div>
    <div class="bg-white border mt-3 py-5 px-5 mx-auto 2xl:w-page">
      <h2>{{ model.title }}</h2>
      <div class="flex items-center gap-1 mt-5">
        <icon-folder-close theme="outline" size="20" fill="#333" />
        <RouterLink :to="{ name: 'system.show', params: { id: model.lesson?.system_id } }">
          {{ model.lesson?.system?.title }}
        </RouterLink>
        <icon-right-small theme="outline" size="20" fill="#333" />
        <RouterLink :to="{ name: 'lesson.show', params: { id: model.lesson_id } }">
          {{ model.lesson?.title }}
        </RouterLink>
      </div>
    </div>
    <CommentList class="w-page m-auto mt-3" type="Video" :id="model.id" />
  </main>
</template>

<style lang="scss"></style>
