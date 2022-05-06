<script setup lang="ts">
import useCaptcha from '@/composables/useCaptcha'

const props = defineProps<{ captcha_code: string; captcha_key: string }>()
const emit = defineEmits(['update:captcha_code', 'update:captcha_key'])

const { captcha, loadCaptcha } = useCaptcha()

watch(captcha, (value) => {
  emit('update:captcha_key', value?.key)
})

loadCaptcha()
</script>

<template>
  <div class="">
    <div class="flex justify-between">
      <FormInput
        @input="$emit('update:captcha_code',($event.target as HTMLInputElement).value)"
        v-clearError="'captcha_code'"
        placeholder="请输入验证码" />
      <img :src="captcha?.img" @click="loadCaptcha()" class="ml-1 cursor-pointer rounded-md border" />
    </div>
    <FormError name="captcha_code" />
  </div>
</template>

<style lang="scss"></style>
