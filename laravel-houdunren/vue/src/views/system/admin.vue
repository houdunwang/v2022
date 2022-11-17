<script setup lang="ts">
import { RouterLink } from 'vue-router'
import draggable from 'vuedraggable'
const { getAll, collection, order } = useSystem()
await getAll()
</script>

<template>
  <main>
    <draggable v-model="collection" group="people" item-key="id" class="grid grid-cols-5 gap-2" @end="order">
      <template #item="{ element }">
        <SystemItem :system="element" />
      </template>
    </draggable>
  </main>
</template>

<style lang="scss"></style>
