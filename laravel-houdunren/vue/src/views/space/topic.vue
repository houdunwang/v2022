<script setup lang="ts">
const route = useRoute()

const { getAll, collection } = useTopic()
await getAll({ page: route.query.page || 1, uid: route.params.uid })
</script>

<template>
  <main class="">
    <HdCard>
      <template #header>TA的贴子</template>
      <TopicItem :topic="item" v-for="item of collection?.data" />
    </HdCard>
    <HdPagination
      :per_page="collection?.meta.per_page"
      :total="collection?.meta.total"
      @currentChange="
        $router.push({ name: 'space.topic', params: { uid: $route.params.uid }, query: { page: $event } })
      " />
  </main>
</template>

<style lang="scss"></style>
