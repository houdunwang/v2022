<script setup lang="ts">
import useTopic from '@/composables/useTopic'
const { collection, getAll } = useTopic()
await getAll()
</script>

<template>
  <el-card shadow="never" :body-style="{ padding: '20px' }" class="mt-3">
    <template #header>
      <div class="header">
        贴子列表
        <el-button type="primary" size="default">发表贴子</el-button>
      </div>
    </template>

    <ul>
      <li v-for="topic of collection?.data" :key="topic.id">
        {{ topic.title }}
      </li>
    </ul>
  </el-card>
</template>

<style lang="scss" scoped>
.header {
  @apply flex justify-between items-center;
}
</style>
