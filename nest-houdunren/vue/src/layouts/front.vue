<script setup lang="ts">
import userStore from '@/store/userStore'
import TopMenu from './front/top-menu.vue'

const { getCurrentUser } = userStore()
await getCurrentUser()
</script>

<template>
  <main>
    <div class="front">
      <TopMenu />
    </div>
    <router-view #default="{ Component }">
      <div class="w-[1200px] m-auto mt-5 mb-20">
        <component :is="Component" />
      </div>
    </router-view>
  </main>
</template>
<style lang="scss" scoped>
.front {
  @apply border-t-4 border-t-orange-600 bg-white py-3 border-b border-b-gray-200 shadow-sm;
}
</style>
