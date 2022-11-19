<script setup lang="ts">
const { update, find, model: form } = useLesson()
const { getAll: getAllSystem, collection } = useSystem()
const route = useRoute()
await Promise.all([find(route.params.id), getAllSystem()])
</script>

<template>
  <HdCard v-if="form">
    <template #header>添加课程</template>
    <el-form label-width="80px" :inline="false" size="default" label-position="top">
      <el-form-item label="课程名称">
        <el-input v-model="form.title"></el-input>
        <HdError name="title" />
      </el-form-item>
      <el-form-item label="系统课程">
        <el-select v-model="form.system_id" placeholder="选择系统课程" clearable filterable>
          <el-option v-for="item in collection" :key="item.id" :label="item.title" :value="item.id"> </el-option>
        </el-select>
        <HdError name="system_id" />
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
        <el-button type="primary" @click="update(form!)">保存提交</el-button>
      </el-form-item>
    </el-form>
  </HdCard>
  
</template>

<style lang="scss"></style>
