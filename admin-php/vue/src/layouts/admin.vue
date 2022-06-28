<script setup lang="ts">
import MenuComponet from './admin/menu.vue'
import Navbar from './admin/navbar.vue'
import HistoryLink from './admin/historyLink.vue'
import { useRoute } from 'vue-router'
import { watch } from 'vue'
import menu from '@/composables/useMenu'
import TopMenu from './admin/topMenu.vue'
import Copyright from './admin/copyright.vue'
import systemStore from '@/store/systemStore'

const route = useRoute()
watch(
  route,
  () => {
    menu.addHistoryMenu(route)
  },
  { immediate: true },
)

await systemStore().load()
</script>

<template>
  <div class="admin">
    <section>
      <Navbar />
      <TopMenu />
    </section>
    <section>
      <router-view #default="{ Component, route }">
        <component :is="Component" />
      </router-view>
    </section>
    <Copyright class="flex justify-center text-white font-bold shadow-sm" />
  </div>
</template>

<style lang="scss" scoped>
.admin {
  background-image: url('/images/admin.jpg');
  background-size: cover;
  min-height: 100vh;
  @apply w-screen grid grid-rows-[1fr_auto_1fr] pb-32 z-50;
  > section:nth-of-type(2) {
    @apply bg-gray-50 rounded-md m-3 p-5 overflow-hidden;
  }
}
</style>
