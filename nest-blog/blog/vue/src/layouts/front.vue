<script setup lang="ts">
import useCategory from '@/composables/useCategory'
const { all, categories } = useCategory()
const { all: getArticleList } = useArticle()
await all()
</script>

<template>
  <main class="front">
    <div class="log cursor-pointer" @click="getArticleList(1, {})">
      <img src="/images/logo.png" class="w-[500px]" />
    </div>
    <nav>
      <section>
        <div v-for="category of categories" :key="category.id" @click="getArticleList(1, { category: category.id })">
          {{ category.title }}
        </div>
      </section>
      <section>
        <el-button type="primary" size="default">发表文章</el-button>
        <el-button type="success" size="default">管理员登录</el-button>
      </section>
    </nav>
    <router-view />
  </main>
</template>

<style lang="scss" scoped>
main.front {
  @apply bg-white shadow-md mt-5 m-auto md:w-[1000px] p-5 rounded-md;
  nav {
    @apply flex justify-between items-center mt-3;
    section {
      @apply flex gap-2 items-center;
      div {
        @apply bg-slate-200 text-gray-700 py-2 px-3 cursor-pointer hover:shadow-lg duration-300 rounded-md;
      }
    }
  }
}
</style>
