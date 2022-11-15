<script lang="ts" setup>
import Menu from './menu.vue'
</script>
<template>
  <main>
    <Menu />
    <RouterView v-slot="{ Component, route }">
      <template v-if="Component">
        <component :is="Component" :key="route.fullPath" class="2xl:w-page mx-auto p-3 lg:mt-5" />
      </template>
    </RouterView>
  </main>
</template>
