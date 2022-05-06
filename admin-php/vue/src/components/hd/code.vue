<script setup lang="ts">
import useCode, { ICodeType } from '@/composables/useCode'

const props = withDefaults(defineProps<{ account: string; code: string; type: ICodeType }>(), {
  account: '',
  code: '',
  type: 'any',
})
const emit = defineEmits(['update:code'])

const { sendCode, sendTime } = useCode()

const time = ref(0)
const timeoutId = setInterval(() => (time.value = sendTime()))

onUnmounted(() => clearInterval(timeoutId))
</script>

<template>
  <div class="">
    <div class="flex justify-between">
      <FormInput
        @input="emit('update:code',($event.target as HTMLInputElement).value)"
        :value="props.code"
        v-clearError="'code'"
        placeholder="请输入验证码"
        class="mr-2" />

      <t-button
        type="button"
        size="large"
        theme="default"
        @click="sendCode(props.account, props.type)"
        :disabled="time > 0">
        {{ time > 0 ? `请${time}秒后发送` : '获取验证码' }}
      </t-button>
    </div>
    <FormError name="code" />
  </div>
</template>

<style lang="scss"></style>
