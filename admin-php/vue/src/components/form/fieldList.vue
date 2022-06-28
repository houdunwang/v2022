<script setup lang="ts">
import { fieldType } from '@/config/form'
import _ from 'lodash'

const { model: PropModel, fields } = defineProps<{
  model?: any
  fields: fieldType[]
}>()

const model = $ref(
  PropModel ||
    _.zipObject(
      fields.map((f) => f.name),
      fields.map((f) => f.value),
    ),
)

const emit = defineEmits<{
  (e: 'submit', model: any): void
}>()
</script>

<template>
  <el-form :model="model" label-width="80px" size="large">
    <el-form-item :label="field.title" v-for="field of fields">
      <template v-if="field.type == 'image'">
        <div class="" v-if="field.disabled">
          <el-avatar shape="square" :size="100" fit="cover" :src="model[field.name]" />
        </div>
        <div class="" v-else>
          <UploadSingleImage v-model="model[field.name]" />
          <FormError :name="field.error_name || field.name" />
        </div>
      </template>
      <template v-else>
        <el-input
          v-model="model[field.name]"
          :placeholder="field.placeholder"
          :disabled="field.disabled"
          @keyup.enter="emit('submit', model)"></el-input>
        <FormError :name="field.error_name || field.name" />
      </template>
    </el-form-item>
    <el-form-item v-if="!$slots.button">
      <slot name="button">
        <el-button type="primary" @click="emit('submit', model)">保存提交</el-button>
      </slot>
    </el-form-item>
  </el-form>
</template>

<style lang="scss"></style>
