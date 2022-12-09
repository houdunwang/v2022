<script setup lang="ts">
import CommentList from '@/components/comment-list.vue'
import dayjs from 'dayjs'
const route = useRoute()
const { authorize } = useAuth()
const { find, model, del } = useTopic()
await find(route.params.id)
</script>

<template>
  <main class="" v-if="model">
    <HdCard>
      <template #header>
        <h1 class="text-xl py-5 flex justify-between">
          {{ model.title }}
          <div class="">
            <el-button type="primary" size="small" @click="$router.push({ name: 'topic.create' })">发表</el-button>
            <template v-if="authorize(model.user_id)">
              <el-button
                type="success"
                size="small"
                @click="$router.push({ name: 'topic.edit', params: { id: model?.id } })"
                >编辑</el-button
              >
              <el-button type="danger" size="small" @click="del(model?.id)"> 删除</el-button>
            </template>
          </div>
        </h1>
        <div class="flex text-xs text-gray-600 gap-2">
          <span>{{ model.user.name }}</span>
          <span class="flex items-center">
            <icon-history theme="outline" fill="#333" />
            {{ dayjs(model.created_at).format('YYYY/DD/MM') }}
          </span>
        </div>
      </template>
      <HdMarkdownPreview :text="model?.html" />
    </HdCard>

    <CommentList class="mt-3" type="Topic" :id="model.id" />
  </main>
</template>

<style lang="scss"></style>
