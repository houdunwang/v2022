<script setup lang="ts">
import { ISite } from '@/apis/apiSite'
import dayjs from 'dayjs'
const props = defineProps<{
  site: ISite
}>()

const emit = defineEmits(['del'])
</script>

<template>
  <div class="site-item">
    <header>
      <section class="">站长: {{ props.site.user.name }}</section>
      <section>
        <icon-blocks-and-arrows theme="outline" />
        扩展模块
      </section>
    </header>
    <main>
      <icon-category-management theme="outline" />
      <h2>{{ props.site.title }}</h2>
    </main>
    <footer>
      <section>
        #1 创建时间 <icon-time theme="outline" /> {{ dayjs(props.site.created_at).format('YYYY-mm-DD mm:ss') }}
      </section>
      <section>
        <router-link to="/"> <icon-home-two theme="outline" /> 访问首页</router-link>
        <router-link to="/"> <icon-home-two theme="outline" /> 访问首页</router-link>
        <router-link to="/"> <icon-home-two theme="outline" /> 访问首页</router-link>
        <router-link :to="{ name: 'site.edit', params: { id: props.site.id } }">
          <icon-home-two theme="outline" /> 编辑站点
        </router-link>
        <a href="javascript:void(0)">
          <el-popconfirm title="确定删除站点吗?" @confirm="emit('del', props.site.id)">
            <template #reference>
              <div class="flex justify-center items-center">
                <icon-delete theme="outline" />
                删除
              </div>
            </template>
          </el-popconfirm>
        </a>

        <router-link to="/"> <icon-home-two theme="outline" /> 访问首页</router-link>
      </section>
    </footer>
  </div>
</template>

<style lang="scss" scoped>
.site-item {
  @apply border text-gray-700 hover:shadow-lg duration-300 rounded-lg;
  header {
    @apply py-3 px-5 border-b flex justify-between items-center shadow-sm text-sm font-bold text-gray-700;
    > :nth-of-type(2) {
      @apply flex justify-center items-center;
    }
  }
  main {
    @apply py-8 px-5 flex items-center;
    span {
      @apply text-5xl mr-2;
    }
    h2 {
      @apply text-lg;
    }
  }
  footer {
    @apply border-t flex justify-between items-center py-3 px-5 text-xs;
    > :first-of-type {
      @apply flex items-center items-center;
      span {
        @apply mx-1;
      }
    }
    > :nth-child(2) {
      @apply flex items-center text-gray-700;
      a {
        @apply flex items-center justify-center ml-2;
        span {
          @apply mr-1;
        }
      }
    }
  }
}
</style>
