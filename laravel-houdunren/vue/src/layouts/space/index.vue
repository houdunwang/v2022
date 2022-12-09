<script lang="ts" setup>
import useUserStore from '@/store/hd/useUserStore'
import Menu from '../front/menu.vue'
const route = useRoute()
const { find, model: user } = useUser()
await find(route.params.uid)
</script>

<template>
  <main class="">
    <Menu />
    <section class="flex justify-center py-16 relative overflow-hidden">
      <el-image :src="user?.avatar" fit="cover" :lazy="true" class="w-56 h-56 rounded-full"></el-image>
      <div class="bg" :style="{ backgroundImage: `url(${user?.avatar})` }"></div>
    </section>
    <section class="lg:w-page m-auto links flex justify-center gap-3 mt-[-30px]">
      <RouterLink
        :to="{ name: 'space', params: { uid: route.params.uid } }"
        :class="{ active: $route.name == 'space' }">
        学习历史
      </RouterLink>
      <RouterLink
        :to="{ name: 'space.topic', params: { uid: route.params.uid } }"
        :class="{ active: $route.name == 'space.topic' }">
        TA的贴子
      </RouterLink>
    </section>
    <RouterView v-slot="{ Component, route }">
      <template v-if="Component">
        <component :is="Component" :key="route.fullPath" class="xl:w-page mx-auto p-3 lg:mt-5" />
      </template>
    </RouterView>
  </main>
</template>

<style lang="scss" scoped>
.bg {
  position: absolute;
  inset: 0;
  background-repeat: no-repeat;
  background-size: cover;
  z-index: -1;
  filter: blur(10px);
}
.links {
  a {
    @apply py-2 px-4 bg-gray-700 hover:bg-orange-600 text-white rounded-md flex;
    &.active {
      @apply bg-orange-600 text-white;
    }
  }
}
</style>
