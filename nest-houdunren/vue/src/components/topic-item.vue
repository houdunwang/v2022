<script setup lang="ts">
import dayjs from 'dayjs'

const { topic } = defineProps<{
  topic: TopicModel
}>()
</script>

<template>
  <div class="flex items-center py-3 border-b pl-[20px]">
    <el-image :src="topic.User.avatar" fit="cover" :lazy="true" class="w-10 h-10 rounded-md" />
    <div class="flex flex-col ml-2">
      <router-link :to="{ name: 'topic.show', params: { id: topic.id } }">{{ topic.title }}</router-link>
      <time class="text-xs">{{ topic.User.name }}发表于 {{ dayjs(topic.createdAt).fromNow() }}</time>
    </div>
  </div>
</template>

<style lang="scss"></style>
