<script setup lang="ts">
const { find, model: form, update } = useTopic()

const route = useRoute()
await find(route.params.id)
</script>

<template>
  <HdCard v-if="form">
    <template #header> 添加贴子 </template>
    <el-form label-width="80px" :inline="false" size="normal">
      <el-form-item label="标题">
        <el-input v-model="form.title"></el-input>
        <HdError name="title" />
      </el-form-item>
      <el-form-item label="内容">
        <HdMarkdownEditor v-model="form.content" />
        <HdError name="content" />
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="update(form)"> 保存提交</el-button>
      </el-form-item>
    </el-form>
  </HdCard>
</template>

<style lang="scss"></style>
