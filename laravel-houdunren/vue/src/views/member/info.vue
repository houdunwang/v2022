<script setup lang="ts">
import useUserStore from '@/store/hd/useUserStore'

const { update } = useUser()
const { user: form } = useUserStore()
</script>

<template>
  <main class="" v-if="form">
    <HdCard>
      <template #header> 修改资料 </template>

      <el-form label-width="80px" :inline="false" size="large" label-position="top">
        <el-form-item label="呢称">
          <el-input v-model="form.name"></el-input>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" @click="update(form)">保存提交</el-button>
        </el-form-item>
      </el-form>
    </HdCard>
  </main>
</template>

<style lang="scss"></style>
