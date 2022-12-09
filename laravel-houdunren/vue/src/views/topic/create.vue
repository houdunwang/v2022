<script setup lang="ts">
const { add } = useTopic()
const form = reactive({
  title: '',
  content: '',
})
</script>

<template>
  <HdCard>
    <template #header> 添加贴子 </template>
    <el-form label-width="80px" :inline="false">
      <el-form-item label="标题">
        <el-input v-model="form.title"></el-input>
        <HdError name="title" />
      </el-form-item>
      <el-form-item label="内容">
        <HdMarkdownEditor v-model="form.content" />
        <HdError name="content" />
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="add(form)">立即创建</el-button>
      </el-form-item>
    </el-form>
  </HdCard>
</template>

<style lang="scss"></style>
