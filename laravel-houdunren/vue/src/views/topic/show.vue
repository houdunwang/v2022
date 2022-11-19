<script setup lang="ts">
import dayjs from 'dayjs'

import UserItem from '@/components/user-item.vue'

const route = useRoute()
const { find, model } = useTopic()
await find(route.params.id)
</script>

<template>
  <main class="" v-if="model">
    <HdCard>
      <template #header>
        <h1 class="text-xl py-5 flex justify-between">
          {{ model.title }}
          <div class="">
            <el-button type="primary" size="small" @click="">发表</el-button>
            <el-button type="success" size="small" @click="">编辑</el-button>
            <el-button type="danger" size="small" @click=""> 删除</el-button>
          </div>
        </h1>
        <div class="flex text-xs text-gray-600 gap-2">
          <span>{{ model.user.name }}</span>
          <span class="flex items-center">
            <icon-history theme="outline" fill="#333" />{{ dayjs(model.created_at).format('YYYY/DD/MM') }}</span
          >
        </div>
      </template>
    </HdCard>

    <HdCard class="mt-3">
      {{ model.content }}
    </HdCard>
  </main>
</template>

<style lang="scss"></style>
