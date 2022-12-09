<script setup lang="ts">
import LearnHistoryItem from './learn-history-item.vue'
import UserItem from './user-item.vue'

const { collection, findAll } = useLearnHistory()
await findAll()
</script>

<template>
  <main>
    <LearnHistoryItem v-for="item of collection" :key="item.id" :item="item" />
  </main>
</template>

<style lang="scss"></style>
