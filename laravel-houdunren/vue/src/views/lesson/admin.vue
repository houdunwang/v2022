<script setup lang="ts">
import LessonBlockItem from '@/components/lesson-block-item.vue'
const { getAll, collection } = useLesson()
await getAll()
</script>

<template>
  <main>
    <section class="grid grid-cols-5 gap-3">
      <LessonBlockItem v-for="item of collection?.data" :key="item.id" :lesson="item" />
    </section>
    <HdPagination
      :per_page="collection?.meta.per_page"
      :total="collection?.meta.total"
      @currentChange="$router.push({ name: 'admin.lesson.index', query: { page: $event } })" />
  </main>
</template>

<style lang="scss"></style>
