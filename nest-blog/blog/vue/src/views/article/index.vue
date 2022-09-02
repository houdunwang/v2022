<script setup lang="ts">
const { all, pageResult } = useArticle()

await all()
</script>

<template>
  <main>
    <section v-for="article of pageResult?.data" :key="article.id">
      <router-link :to="{ name: 'article.show', params: { id: article.id } }">
        {{ article.title }}
      </router-link>
      <aside @click="all(1, { category: article.categoryId })">
        {{ article.category.title }}
      </aside>
    </section>

    <div class="mt-5 border-t border-gray-100 pt-3">
      <el-pagination
        @current-change="all"
        :page-sizes="[20, 40, 80, 100]"
        :page-size="pageResult?.meta.page_row"
        :total="pageResult?.meta.total"
        background>
      </el-pagination>
    </div>
  </main>
</template>

<style lang="scss" scoped>
main {
  @apply pt-8;
  section {
    @apply mt-2 flex justify-between items-center;
    a {
      @apply bg-slate-100 text-gray-600 py-2 px-3 mb-2;
    }
    aside {
      @apply text-xs p-2 text-gray-500 font-bold cursor-pointer;
    }
  }
}
</style>
