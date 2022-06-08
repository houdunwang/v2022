<script setup lang="ts">
import systemStore from '@/store/systemStore'
import { isSuperAdmin, logout } from '@/utils/helper'

const store = systemStore()
</script>

<template>
  <div class="topmenu">
    <img :src="store.config.config.site.logo" alt="" />
    <section>
      <div class="">
        <router-link :to="{ name: 'site.index' }">
          <icon-category-management theme="outline" />
          网站管理
        </router-link>
        <router-link :to="{ name: 'system.index' }" v-if="isSuperAdmin()">
          <icon-system theme="outline" />
          系统设置
        </router-link>
        <router-link to="/">
          <icon-power theme="outline" @click="logout" />
          退出登录
        </router-link>
      </div>
    </section>
  </div>
</template>

<style lang="scss" scoped>
.topmenu {
  @apply grid grid-cols-12 p-8;
  img {
    @apply col-span-4;
  }
  section {
    @apply col-span-8;
    > div {
      @apply flex justify-end;
      a {
        @apply text-gray-700 ml-2 w-40 flex flex-col items-center justify-center bg-white shadow-md rounded-md p-5 opacity-80 hover:opacity-100 duration-300;
        span {
          @apply text-4xl;
        }
      }
    }
  }
}
</style>
