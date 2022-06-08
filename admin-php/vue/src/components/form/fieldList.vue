<script setup lang="ts">
import { fieldType } from '@/config/form'
import _ from 'lodash'

const props = defineProps<{
  model: Record<string, any>
  fields: fieldType[]
}>()

const emit = defineEmits<{
  (e: 'submit'): void
}>()
</script>

<template>
  <el-form :model="model" label-width="80px" size="large">
    <el-form-item :label="field.title" v-for="field of props.fields">
      <template v-if="field.type == 'input' || !field.type">
        <el-input v-model="model[field.name]" :placeholder="field.placeholder" :disabled="field.disabled"></el-input>
        <FormError :name="field.error_name || field.name" />
      </template>
      <template v-if="field.type == 'image'">
        <div class="" v-if="field.disabled">
          <el-avatar shape="square" :size="100" fit="cover" :src="model[field.name]" />
        </div>
        <div class="" v-else>
          <UploadSingleImage v-model="model[field.name]" />
          <FormError :name="field.error_name || field.name" />
        </div>
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
