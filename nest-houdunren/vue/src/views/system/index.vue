<script setup lang="ts">
import useSystem from '@/composables/useSystem'

const { collection, findAll } = useSystem()
await findAll()
</script>

<template>
  <el-card shadow="always" :body-style="{ padding: '20px' }">
    <template #header>
      <div>系统课程</div>
    </template>
    <section class="grid grid-cols-3 gap-3">
      <div
        v-for="system of collection"
        :key="system.id"
        class="border cursor-pointer"
        @click="$router.push({ name: 'system.show', params: { id: system.id } })">
        <el-image :src="system.preview" fit="cover" :lazy="true" class=""></el-image>
        <h4 class="text-center py-2 font-bold text-gray-700">{{ system.title }}</h4>
      </div>
    </section>
  </el-card>
</template>

<style lang="scss"></style>
