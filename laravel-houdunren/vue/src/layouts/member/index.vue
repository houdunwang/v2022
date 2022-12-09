<script lang="ts" setup>
import useUserStore from '@/store/hd/useUserStore'
import Menu from '../front/menu.vue'
const userStore = useUserStore()
</script>

<template>
  <main class="">
    <Menu />
    <div class="lg:w-page m-auto grid grid-cols-12 mt-5 gap-3">
      <section class="col-span-2">
        <el-image :src="userStore.user?.avatar" fit="cover" :lazy="true" class="rounded-md" />

        <div class="links flex flex-col gap-2">
          <router-link :to="{ name: 'member' }" :class="{ active: $route.name == 'member' }"> 修改资料 </router-link>
          <router-link :to="{ name: 'member.avatar' }" :class="{ active: $route.name == 'member.avatar' }">
            设置头像
          </router-link>
          <router-link :to="{ name: 'member.mobile' }" :class="{ active: $route.name == 'member.mobile' }">
            绑定手机
          </router-link>
        </div>
      </section>

      <section class="col-span-10">
        <RouterView v-slot="{ Component, route }">
          <template v-if="Component">
            <component :is="Component" :key="route.fullPath" class="" />
          </template>
        </RouterView>
      </section>
    </div>
  </main>
</template>

<style lang="scss" scoped>
div.links {
  a {
    @apply py-2 px-4 bg-gray-600 hover:bg-orange-600 text-white rounded-sm flex;
    &.active {
      @apply bg-orange-600 text-white;
    }
  }
}
</style>
