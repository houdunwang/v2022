<script setup lang="ts">
import useLesson from '@/composables/useLesson'
import { useRoute } from 'vue-router'
import { VideoOne } from '@icon-park/vue-next'
const { findOne, lesson } = useLesson()
const route = useRoute()

await findOne(+route.params.id)
</script>

<template>
  <el-card shadow="always" :body-style="{ padding: '20px' }">
    <template #header>
      <div class="flex items-center">
        <el-tag type="danger" size="small" effect="dark" class="mr-2">实战课程</el-tag>
        <span class="font-bold">{{ lesson.title }}</span>
      </div>
    </template>
    <p class="bg-gray-100 p-3 text-gray-700 opacity-90">
      {{ lesson.description }}
    </p>
  </el-card>

  <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-5">
    <template #header>
      <div>视频列表</div>
    </template>
    <router-link
      :to="{ name: 'video.show', params: { id: video.id } }"
      v-for="video of lesson.videos"
      :key="video.id"
      class="border-b py-3 text-gray-700 flex items-center">
      <VideoOne theme="outline" size="24" class="mr-2 text-gray-300" />
      {{ video.title }}
    </router-link>
  </el-card>
</template>

<style lang="scss"></style>
