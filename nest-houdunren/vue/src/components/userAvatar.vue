<script setup lang="ts">
const { avatar } = defineProps<{
  avatar: string
}>()
</script>

<template>
  <el-image :src="avatar" fit="cover" class="w-10 h-10 rounded-md" />
</template>

<style lang="scss"></style>
