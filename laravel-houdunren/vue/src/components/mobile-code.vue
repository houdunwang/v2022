<script setup lang="ts">
import useIntervalRequest from '@/composables/hd/useIntervalRequest'
import { ElMessage } from 'element-plus'
import config from '@/config'

defineEmits(['update:code', 'update:mobile'])
const { send } = useMobileCode()
const mobile = ref(config.mobile)

const { exec, time } = useIntervalRequest(3, async () => {
  if (!/^\d{11}$/.test(mobile.value + '')) {
    ElMessage.error('手机号格式错误')
    throw new Error('bad')
  } else send(mobile.value)
})
</script>

<template>
  <main class="">
    <HdFormInput
      v-model="mobile"
      type="password"
      placeholder="请输入手机号"
      v-clearError="'mobile'"
      @update:modelValue="$emit('update:mobile', $event)" />
    <HdError name="mobile" />
    <div class="flex gap-1 mt-2">
      <HdFormInput placeholder="请输入验证码" @update:modelValue="$emit('update:code', $event)" />
      <el-button disabled size="large" v-if="time">{{ time }}秒后操作</el-button>
      <el-button type="primary" size="large" @click="exec" v-else>发送验证码</el-button>
    </div>
    <HdError name="code" />
  </main>
</template>

<style lang="scss"></style>
