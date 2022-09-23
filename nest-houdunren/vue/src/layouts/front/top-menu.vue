<script setup lang="ts">
import useUtil from '@/composables/system/useUtil'
import userStore from '@/store/userStore'
import dayjs from 'dayjs'
const { isLogin, logout } = useUtil()
const { user } = userStore()
</script>

<template>
  <div class="top-menu">
    <section>
      <router-link to="/">后盾人</router-link>
      <router-link :to="{ name: 'system.index' }"> 系统课程</router-link>
      <router-link :to="{ name: 'lesson.index' }">实战课程</router-link>
      <router-link to="/">会员订阅</router-link>
      <router-link to="/">在线文档</router-link>
      <router-link to="/">源码仓库</router-link>
    </section>
    <section>
      <div class="" v-if="isLogin()">
        <el-dropdown>
          <div class="flex">
            <el-image :src="user?.avatar" fit="cover" class="rounded-sm w-8 h-8" />
            <div class="flex flex-col ml-2 justify-between">
              <span class="font-bold">{{ user?.name }}</span>
              <time class="text-xs">注册于 {{ dayjs(user?.createdAt).fromNow() }}</time>
            </div>
          </div>
          <template #dropdown>
            <el-dropdown-menu>
              <el-dropdown-item @click="logout"> 退出 </el-dropdown-item>
            </el-dropdown-menu>
          </template>
        </el-dropdown>
      </div>
      <div v-else>
        <el-button type="primary" size="small" @click="$router.push('/login')">登录</el-button>
        <el-button type="success" size="small" @click="$router.push({ name: 'register' })"> 注册</el-button>
      </div>
    </section>
  </div>
</template>

<style lang="scss" scoped>
div.top-menu {
  @apply flex justify-between;
  @apply w-[1200px] m-auto;
  > section:nth-of-type(1) {
    @apply flex gap-8 items-center;
    a {
      @apply text-gray-500 hover:text-gray-800 duration-300 font-bold;
      &:nth-of-type(1) {
        @apply text-orange-700 font-bold text-lg;
      }
    }
  }
  > section:nth-of-type(2) {
    // > div:nth-of-type(1) {
    //   @apply flex items-center justify-between;
    //   div {
    //     @apply flex flex-col text-sm ml-2 font-medium text-gray-600;
    //     time {
    //       @apply text-xs text-gray-500;
    //     }
    //   }
    // }
  }
}
</style>
