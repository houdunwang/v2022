<script setup lang="ts">
defineEmits(['update:captcha'])
const key = ref(1)

const reload = () => {
  key.value++
}
defineExpose({ reload })
</script>

<template>
  <main class="">
    <div class="flex gap-1">
      <HdFormInput placeholder="请输入验证码" @update:modelValue="$emit('update:captcha', $event)" />
      <!-- <el-input placeholder="请输入验证码" size="large" clearable /> -->
      <el-image :src="`/api/captcha?` + key" fit="cover" class="rounded-md border cursor-pointer" @click="reload" />
    </div>
    <HdError name="captcha" />
  </main>
</template>

<style lang="scss"></style>
