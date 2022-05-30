<script setup lang="ts">
import MenuComponet from './admin/menu.vue'
import Navbar from './admin/navbar.vue'
import HistoryLink from './admin/historyLink.vue'
import { useRoute } from 'vue-router'
import { watch } from 'vue'
import menu from '@/composables/useMenu'
import TopMenu from './admin/topMenu.vue'

const route = useRoute()
watch(
  route,
  () => {
    menu.addHistoryMenu(route)
  },
  { immediate: true },
)
</script>

<template>
  <div class="admin">
    <section class>
      <Navbar />
      <TopMenu />
    </section>
    <section class="">
      <div class="m-3 p-3">
        <router-view #default="{ Component, route }">
          <component :is="Component" />
        </router-view>
      </div>
    </section>
  </div>
</template>

<style lang="scss" scoped>
.admin {
  background-image: url('/images/admin.jpg');
  background-size: cover;
  min-height: 100vh;
  @apply w-screen grid grid-rows-[auto_1fr] pb-32 z-50;
  > :nth-child(2) {
    @apply bg-gray-50 m-5 rounded-md;
  }
}
</style>
