<script setup lang="ts">
const { article, find } = useArticle()
const route = useRoute()
await find(+route.params.id)
</script>

<template>
  <main>
    <h1>{{ article?.title }}</h1>
    <p>
      {{ article?.content }}
    </p>
  </main>
</template>

<style lang="scss">
main {
  h1 {
    @apply mb-4 border-b border-gray-500 pb-3 mt-8 text-2xl text-gray-600;
  }
  p {
    @apply text-gray-600;
  }
}
</style>
