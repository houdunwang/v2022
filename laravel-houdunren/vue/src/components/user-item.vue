<script setup lang="ts">
const { user } = defineProps<{ user: UserModel }>()
</script>

<template>
  <router-link :to="{ name: 'space', params: { uid: user.id } }">
    <el-image :src="user.avatar" fit="cover" :lazy="true" class="w-10 h-10 rounded-md" v-bind="$attrs" />
  </router-link>
</template>

<style lang="scss"></style>
