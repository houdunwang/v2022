<script setup lang="ts">
import useUserStore from '@/store/hd/useUserStore'
const { update } = useUser()
const { user: form } = useUserStore()
</script>

<template>
  <main class="" v-if="form">
    <HdCard>
      <template #header> 设置头像 </template>
      <HdUploadSingleImage v-model="form.avatar" />
      <el-button type="primary" size="default" @click="update(form)">保存提交</el-button>
    </HdCard>
  </main>
</template>

<style lang="scss"></style>
