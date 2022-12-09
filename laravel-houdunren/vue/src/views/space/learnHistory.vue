<script setup lang="ts">
import LearnHistoryItem from '@/components/learn-history-item.vue'

const route = useRoute()
const { getByUser } = useLearnHistory()
const collection = await getByUser(route.params.uid, route.query.page || 1)
</script>

<template>
  <main>
    <HdCard>
      <template #header>学习历史</template>
      <LearnHistoryItem v-for="item of collection.data" :key="item.id" :item="item" />
    </HdCard>

    <HdPagination
      :per_page="collection?.meta.per_page"
      :total="collection?.meta.total"
      @currentChange="$router.push({ name: 'space', params: { uid: $route.params.uid }, query: { page: $event } })" />
  </main>
</template>

<style lang="scss"></style>
