<script setup lang="ts">
import TopicItem from '@/components/topic-item.vue'
const route = useRoute()
const { collection, getAll } = useTopic()
await getAll({ page: route.query.page || 1 })
</script>

<template>
  <main class="">
    <HdCard>
      <template #header>
        <div class="flex justify-between items-center">
          贴子列表
          <el-button type="primary" size="default" @click="$router.push({ name: 'topic.create' })">发表贴子</el-button>
        </div>
      </template>
      <TopicItem :topic="item" v-for="item of collection?.data" />
    </HdCard>
    <HdPagination
      :per_page="collection?.meta.per_page"
      :total="collection?.meta.total"
      @currentChange="$router.push({ name: 'topic.index', query: { page: $event } })" />
  </main>
</template>

<style lang="scss"></style>
