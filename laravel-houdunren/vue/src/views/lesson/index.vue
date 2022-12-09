<script setup lang="ts">
const { getAll, collection } = useLesson()
const route = useRoute()
await getAll(route.query.page || 1, 8)
</script>

<template>
  <main class="">
    <HdCard>
      <template #header>碎片课程</template>
      <main class="grid grid-cols-4 gap-2">
        <LessonBlockItem v-for="item of collection?.data" :key="item.id" :lesson="item" />
      </main>
    </HdCard>

    <HdPagination
      :per_page="collection?.meta.per_page"
      :total="collection?.meta.total"
      @currentChange="$router.push({ name: 'lesson.index', query: { page: $event } })" />
  </main>
</template>

<style lang="scss"></style>
