<script setup lang="ts">
import { syncAllSiteData } from '@/apis/site'
</script>

<template>
  <div class="navbar py-3">
    <section>
      <router-link to="/"><icon-blocks-and-arrows theme="outline" />模块管理</router-link>
      <router-link to="/"> <icon-me theme="outline" /> 会员中心</router-link>
      <router-link to="/"><icon-blocks-and-arrows theme="outline" />模块管理</router-link>
    </section>
    <section class="flex justify-center items-center relative cursor-pointer">
      <HdNotification class="mr-8 text-[#7ed321] hidden md:flex" />
      <HdFullscreen class="text-[#7ed321] hidden md:flex" />
      <el-button type="primary" size="small" @click="syncAllSiteData" class="mr-1">同步模块数据</el-button>
      <UserDrop class="text-gray-300 ml-2" />
    </section>
  </div>
</template>

<style lang="scss" scoped>
.navbar {
  @apply bg-gray-800 flex justify-between items-center px-5;
  > section:first-of-type {
    @apply hidden md:flex;
    a {
      @apply flex items-center text-gray-300 text-base mr-2 hover:text-white duration-300 opacity-80;
      span {
        @apply mr-1;
      }
    }
  }

  > section:nth-of-type(2) {
    @apply flex flex-row-reverse flex-1 justify-between md:flex-none md:flex-row;
  }
}
</style>
