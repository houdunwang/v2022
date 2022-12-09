<script lang="ts" setup>
import Copyright from './copyright.vue'
import Menu from './menu.vue'
</script>
<template>
  <main class="">
    <Menu />
    <RouterView v-slot="{ Component, route }">
      <template v-if="Component">
        <component :is="Component" :key="route.fullPath" class="xl:w-page mx-auto p-3 lg:mt-5" />
      </template>
    </RouterView>
    <Copyright />
  </main>
</template>
