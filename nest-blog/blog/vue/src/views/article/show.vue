<script setup lang="ts">
import { isLogin } from '@/utils/helper'

const { article, find } = useArticle()
const route = useRoute()
await find(+route.params.id)
</script>

<template>
  <main>
    <h1>
      {{ article?.title }}
      <el-button
        type="danger"
        size="small"
        v-if="isLogin()"
        @click="$router.push({ name: 'article.update', params: { id: article?.id } })"
        >编辑</el-button
      >
    </h1>
    <time> 发表时间:{{ article?.createdAt }} &nbsp;&nbsp;&nbsp;&nbsp; 更新时间:{{ article?.updatedAt }} </time>
    <p v-html="article?.content"></p>
  </main>
</template>

<style lang="scss">
main {
  h1 {
    @apply mb-4 border-b border-gray-500 pb-3 mt-8 text-2xl text-gray-600 flex justify-between;
  }
  time {
    @apply text-xs font-bold text-slate-600 mb-5 block;
  }
  p {
    @apply text-gray-600;
  }
}
</style>
