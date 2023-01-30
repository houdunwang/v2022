<script setup lang="ts">
import UserAvatarMenu from '@/components/userAvatarMenu.vue'

const { isLogin } = useAuth()
</script>

<template>
  <main class="border-b-4 border-b-orange-600 shadow-lg flex justify-between">
    <div class="xl:w-page h-[60px] m-auto flex justify-between items-center">
      <section class="flex items-center gap-5">
        <RouterLink to="/" class="flex items-center gap-1">
          <icon-youtube theme="outline" size="32" />
          <span class="font-bold text-xl"> houdunren</span>
        </RouterLink>
        <RouterLink :to="{ name: 'system.index' }" class="flex items-center gap-1"> 系统课程 </RouterLink>
        <RouterLink :to="{ name: 'lesson.index' }" class="flex items-center gap-1"> 碎片课程 </RouterLink>
        <RouterLink :to="{ name: 'video.index' }" class="flex items-center gap-1"> 最近更新 </RouterLink>
        <RouterLink :to="{ name: 'topic.index' }" class="flex items-center gap-1"> 互动交流 </RouterLink>
        <RouterLink :to="{ name: 'topic.index' }" class="flex items-center gap-1"> 在线文档 </RouterLink>
        <router-link :to="{ name: 'subscribe' }" class="flex items-center gap-1">
          订阅优惠
          <el-tag type="success" size="small" effect="dark">荐</el-tag>
        </router-link>
      </section>
      <section>
        <div class="" v-if="isLogin()">
          <UserAvatarMenu />
        </div>
        <div class="" v-else>
          <el-button type="primary" size="default" @click="$router.push({ name: 'login' })">登录</el-button>
        </div>
      </section>
    </div>
  </main>
</template>

<style lang="scss" scoped>
a {
  @apply gap-2  text-gray-600 font-bold;
}
</style>
