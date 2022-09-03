<script setup lang="ts">
import useCategory from '@/composables/useCategory'
const { all, categories } = useCategory()
const { all: getArticleList } = useArticle()
await all()
</script>

<template>
  <main class="front">
    <div class="log cursor-pointer" @click="$router.push('/')">
      <img src="/images/logo.png" class="w-[500px]" />
    </div>
    <nav>
      <section>
        <div
          v-for="category of categories"
          :key="category.id"
          :class="{ active: +$route.params.cid === category.id }"
          @click="$router.push({ name: 'category.index', params: { cid: category.id } })">
          {{ category.title }}
        </div>
      </section>
      <section>
        <el-button type="primary" size="default" @click="$router.push({ name: 'article.create' })">发表文章</el-button>
        <el-button type="success" size="default">管理员登录</el-button>
      </section>
    </nav>
    <router-view />
  </main>
</template>

<style lang="scss" scoped>
main.front {
  @apply bg-gray-50 md:shadow-md md:mt-5 m-auto md:w-[1000px] p-5 md:rounded-md;
  nav {
    @apply flex md:flex-row flex-col md:justify-between md:items-center mt-3;
    section {
      @apply flex gap-2 items-center flex-wrap;
      div {
        @apply bg-slate-200 text-gray-700 py-2 px-3 cursor-pointer hover:shadow-lg duration-300 rounded-md;
        &.active {
          @apply bg-orange-600 text-white;
        }
      }
      &:nth-of-type(2) {
        @apply flex justify-between  mt-3 md:mt-0 ml-0;
        button {
          @apply flex-1;
        }
      }
    }
  }
}
</style>
