<script setup lang="ts">
import MarkdownPreview from '@/components/hd/markdownPreview.vue'
import useTopic from '@/composables/useTopic'
import { can } from '@/helper'
import dayjs from 'dayjs'
import { useRoute } from 'vue-router'
import Comment from '../../components/comment.vue'
const route = useRoute()
const { topic, findOne } = useTopic()
await findOne(+route.params.id)
</script>

<template>
  <main>
    <el-card shadow="always" :body-style="{ padding: '20px' }">
      <template #header>
        <div class="flex justify-between">
          <div>
            <div class="mb-3">{{ topic.title }}</div>
            <div class="text-sm opacity-75">{{ topic.User.name }} 发表于 {{ dayjs(topic.createdAt).fromNow() }}</div>
          </div>
          <el-button
            type="primary"
            size="default"
            @click="$router.push({ name: 'topic.edit', params: { id: topic.id } })"
            v-if="can(topic)">
            编辑
          </el-button>
        </div>
      </template>
      <MarkdownPreview :text="topic.content" />
    </el-card>
    <Comment class="mt-3" type="topic" :id="topic.id" />
  </main>
</template>

<style lang="scss"></style>
