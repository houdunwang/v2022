<script setup lang="ts">
import { RouterLink } from 'vue-router'

const { getAll, collection } = useSystem()
await getAll()
</script>

<template>
  <main class="grid grid-cols-3 gap-2">
    <section v-for="item of collection" :key="item.id" class="border rounded-md overflow-hidden bg-white">
      <RouterLink :to="{ name: 'system.show', params: { id: item.id } }">
        <el-image :src="item.preview" fit="cover" :lazy="true" />
        <div class="p-3 text-center border-t">
          {{ item.title }}
        </div>
      </RouterLink>
    </section>
  </main>
</template>

<style lang="scss"></style>
