<script setup lang="ts">
const { update, find, model: form } = useSystem()
const route = useRoute()
await find(route.params.id)
</script>

<template>
  <HdCard v-if="form">
    <template #header>添加课程</template>
    <el-form label-width="80px" :inline="false" size="normal" label-position="top">
      <el-form-item label="课程名称">
        <el-input v-model="form.title"></el-input>
        <HdError name="title" />
      </el-form-item>
      <el-form-item label="预览图">
        <div class="flex flex-col">
          <HdUploadSingleImage v-model="form.preview" />
          <HdError name="preview" />
        </div>
      </el-form-item>
      <el-form-item label="课程介绍 ">
        <el-input v-model="form.description" type="textarea"></el-input>
        <HdError name="description" />
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="update(form!)">立即创建</el-button>
        <el-button>取消</el-button>
      </el-form-item>
    </el-form>
  </HdCard>
</template>

<style lang="scss"></style>
