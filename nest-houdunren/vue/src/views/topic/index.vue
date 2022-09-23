<script setup lang="ts">
import useTopic from '@/composables/useTopic'
import TopicItem from '../../components/topic-item.vue'

const { collection, findAll } = useTopic()
await findAll()
</script>

<template>
  <el-card shadow="never" :body-style="{ padding: '0px' }">
    <template #header>
      <div class="flex justify-between items-center">
        贴子列表
        <el-button type="primary" size="default" @click="$router.push({ name: 'topic.add' })">发表贴子</el-button>
      </div>
    </template>
    <TopicItem v-for="topic of collection.data" :key="topic.id" :topic="topic" />
  </el-card>
  <div class="bg-white p-3 mt-3">
    <el-pagination
      @current-change="findAll"
      :page-size="collection.meta.row"
      :total="collection.meta.total"
      background />
  </div>
</template>

<style lang="scss"></style>
