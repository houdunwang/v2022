<script setup lang="ts">
import systemStore from '@/store/systemStore'

const store = systemStore()
</script>

<template>
  <div class="">
    {{ store.config.config.site.copyright }}
  </div>
</template>

<style lang="scss"></style>
