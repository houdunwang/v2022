<script setup lang="ts">
import Navbar from './front/navbar.vue'
import userStore from '@/store/userStore'
const store = userStore()
await store.getUser()
</script>

<template>
  <navbar />
  <router-view #default="{ Component }">
    <div class="container">
      <component :is="Component" />
    </div>
  </router-view>
</template>

<style lang="scss" scoped>
.container {
  @apply w-[1200px] m-auto;
}
</style>
