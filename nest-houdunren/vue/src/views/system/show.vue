<script setup lang="ts">
import useSystem from '@/composables/useSystem'
import { useRoute } from 'vue-router'
const { findOne, system } = useSystem()
const route = useRoute()

await findOne(+route.params.id)
</script>

<template>
  <el-card shadow="always" :body-style="{ padding: '20px' }">
    <template #header>
      <div class="flex items-center">
        <el-tag type="danger" size="small" effect="dark" class="mr-2">系统课程</el-tag>
        <span class="font-bold">{{ system.title }}</span>
      </div>
    </template>
    <p class="bg-gray-100 p-3 text-gray-700 opacity-90">
      {{ system.description }}
    </p>
  </el-card>

  <el-card shadow="always" :body-style="{ padding: '20px' }" class="mt-5">
    <template #header>
      <div>课程列表</div>
    </template>
    <router-link to="/" v-for="lesson of system.lessons" :key="lesson.id" class="block border-b py-3 text-gray-700">
      {{ lesson.title }}
    </router-link>
  </el-card>
</template>

<style lang="scss"></style>
