<script setup lang="ts">
const { user } = defineProps<{
  user: UserModel
}>()
</script>

<template>
  <div class="flex gap-2 items-center">
    <el-image :src="user.avatar" fit="cover" :lazy="true" class="w-8 h-8 rounded-sm" />
    <div class="flex flex-col">
      {{ user.name }}
      <span class="text-xs text-gray-600">
        <slot />
      </span>
    </div>
  </div>
</template>

<style lang="scss"></style>
