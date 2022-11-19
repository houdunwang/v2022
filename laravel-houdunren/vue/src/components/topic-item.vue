<script setup lang="ts">
import dayjs from 'dayjs'
import UserItem from './user-item.vue'
const { topic } = defineProps<{ topic: TopicModel }>()
</script>

<template>
  <section class="flex border-b py-3 border-b-gray-200 justify-between">
    <div class="flex gap-2">
      <UserItem :user="topic.user" class="" />
      <div class="flex flex-col justify-between">
        <router-link :to="{ name: 'topic.show', params: { id: topic.id } }">
          {{ topic.title }}
        </router-link>
        <span class="text-gray-500 text-xs">{{ topic.user.name }}</span>
      </div>
    </div>
    <span class="text-gray-500 text-xs">
      {{ dayjs(topic.created_at).format('YYYY/DD/MM') }}
    </span>
  </section>
</template>

<style lang="scss"></style>
