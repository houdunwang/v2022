<script setup lang="ts"></script>

<template>
  <div class="navbar py-3">
    <section class="">
      <router-link to="/"><icon-blocks-and-arrows theme="outline" />模块管理</router-link>
      <router-link to="/"> <icon-me theme="outline" /> 会员中心</router-link>
      <router-link to="/"><icon-blocks-and-arrows theme="outline" />模块管理</router-link>
    </section>
    <div class="flex justify-center items-center relative cursor-pointer">
      <HdNotification class="mr-8 text-[#7ed321]" />
      <HdFullscreen class="text-[#7ed321]" />
      <UserDrop class="text-gray-300" />
    </div>
  </div>
</template>

<style lang="scss" scoped>
.navbar {
  @apply bg-gray-800 flex justify-between items-center px-5;
  :first-of-type {
    @apply flex;
    a {
      @apply flex items-center text-gray-300 text-base mr-2 hover:text-white duration-300 opacity-80;
      span {
        @apply mr-1;
      }
    }
  }
}
</style>
