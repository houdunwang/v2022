<script setup lang="ts">
import { RouterLink } from 'vue-router'

const { getAll, collection } = useSystem()
await getAll()
</script>

<template>
  <main class="grid grid-cols-3 gap-2">
    <SystemItem v-for="item of collection" :key="item.id" :system="item" />
  </main>
</template>

<style lang="scss"></style>
