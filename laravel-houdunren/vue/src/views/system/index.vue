<script setup lang="ts">
import { RouterLink } from 'vue-router'

const { getAll, collection } = useSystem()
await getAll()
</script>

<template>
  <HdCard>
    <template #header>系统课程</template>
    <div class="py-5 text-center text-lg text-gray-600">系统课程是碎片课程的编组，每个系统课程包含多个碎片课程</div>
    <main class="grid grid-cols-3 gap-2">
      <SystemItem v-for="item of collection" :key="item.id" :system="item" />
    </main>
  </HdCard>
</template>

<style lang="scss"></style>
