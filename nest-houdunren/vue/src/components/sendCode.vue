<script setup lang="ts">
import useIntervalRequest from '@/composables/system/useIntervalRequest'
import { ElMessage } from 'element-plus'
import useCode from '@/composables/useCode'
const { sendCode } = useCode()
const { mobile, code } = defineProps<{ mobile: any; code: any }>()
defineEmits(['update:code'])

const { exec, time } = useIntervalRequest(10, (check, time) => {
  if (!mobile) return ElMessage.error('请输入手机号')
  if (check()) sendCode({ mobile })
})
</script>

<template>
  <div class="flex justify-between gap-2 mt-3 items-stretch">
    <FormInputComponent
      v-model="code"
      @input="$emit('update:code', $event.target.value)"
      placeholder="请输入短信验证码"
      v-clearError="'code'" />
    <el-button disabled size="default" class="h-auto" v-if="time > 0"> 请{{ time }} 后操作 </el-button>
    <el-button type="primary" size="default" @click="exec" class="h-auto" v-else> 发送验证码 </el-button>
  </div>
</template>

<style lang="scss"></style>
