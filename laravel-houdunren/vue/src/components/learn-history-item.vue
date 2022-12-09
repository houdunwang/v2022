<script setup lang="ts">
import dayjs from 'dayjs'

const { item } = defineProps<{
  item: LearnHistoryModel
}>()
</script>

<template>
  <div class="flex gap-2 py-2 border-b border-gray-200">
    <UserItem :user="item.user" />
    <div class="flex flex-col">
      <RouterLink :to="{ name: 'video.show', params: { id: item.video_id } }">
        {{ item.video.title }}
      </RouterLink>
      <span class="text-xs text-gray-700"> {{ dayjs(item.updated_at).fromNow() }} </span>
    </div>
  </div>
</template>

<style lang="scss"></style>
