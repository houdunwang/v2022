<script setup lang="ts">
import _ from 'lodash'

const props = defineProps<{
  model: Record<string, any>
  fields: {
    title: string
    name: string
    error_name?: string
    type?: 'input' | 'textarea' | 'radio' | 'image'
    placeholder?: string
  }[]
}>()

const emit = defineEmits<{
  (e: 'submit'): void
}>()
</script>

<template>
  <el-form :model="model" label-width="80px" size="large">
    <el-form-item :label="field.title" v-for="field of props.fields">
      <template v-if="field.type == 'input' || !field.type">
        <el-input v-model="model[field.name]" :placeholder="field.placeholder"></el-input>
        <FormError :name="field.error_name || field.name" />
      </template>
      <template v-if="field.type == 'image'">
        <UploadSingleImage v-model="model[field.name]" />
        <FormError :name="field.error_name || field.name" />
      </template>
    </el-form-item>
    <el-form-item>
      <slot name="button">
        <el-button type="primary" @click="emit('submit')">保存提交</el-button>
      </slot>
    </el-form-item>
  </el-form>
</template>

<style lang="scss"></style>
