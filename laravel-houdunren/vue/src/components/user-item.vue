<script setup lang="ts">
const { user } = defineProps<{ user: UserModel }>()
</script>

<template>
  <el-image :src="user.avatar" fit="cover" :lazy="true" class="w-10 h-10 rounded-sm" v-bind="$attrs" />
</template>

<style lang="scss"></style>
