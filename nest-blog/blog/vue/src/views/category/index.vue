<script setup lang="ts">
import ArticleList from '@/components/articleList.vue'
const route = useRoute()
</script>

<template>
  <ArticleList :cid="route.params.cid" :key="+route.params.cid" />
</template>

<style lang="scss"></style>
