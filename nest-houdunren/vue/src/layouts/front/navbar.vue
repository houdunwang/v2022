<script setup lang="ts">
import userStore from '@/store/userStore'
import dayjs from 'dayjs'
const { user } = userStore()
</script>

<template>
  <main class="front">
    <div>
      <section>
        <router-link to="/"> 后盾人</router-link>
        <router-link to="/">系统课程</router-link>
        <router-link to="/">实战课程</router-link>
        <router-link to="/">交流讨论</router-link>
        <router-link to="/">最新视频</router-link>
        <router-link to="/">在线文档</router-link>
        <router-link to="/">会员订阅</router-link>
      </section>
      <section>
        <img :src="user.avatar" />
        <div>
          {{ user.name }}
          <time>注册于 {{ dayjs(user.createdAt).fromNow() }}</time>
        </div>
      </section>
    </div>
  </main>
</template>

<style lang="scss" scoped>
.front {
  @apply border-t-4 border-t-orange-600 bg-white py-3 flex justify-between border-b-2 border-b-gray-200;
  & > div {
    @apply w-[1200px] m-auto flex justify-between;
    & > section:nth-of-type(1) {
      @apply flex items-center gap-4;
      a {
        @apply text-gray-500 font-bold hover:text-gray-700 duration-300;
        &:nth-of-type(1) {
          @apply text-orange-600 font-bold text-lg;
        }
      }
    }
    & > section:nth-of-type(2) {
      @apply flex;
      > img {
        @apply rounded-full w-10 h-10 object-cover;
      }
      > div {
        @apply flex flex-col ml-2 text-gray-700;
        time {
          @apply text-xs;
        }
      }
    }
  }
}
</style>
