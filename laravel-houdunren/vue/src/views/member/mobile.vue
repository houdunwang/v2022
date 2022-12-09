<script setup lang="ts">
const { bindMobile } = useUser()
const form = reactive({
  mobile: '',
  code: '',
})
</script>

<template>
  <main class="">
    <HdCard>
      <template #header> 修改资料 </template>
      <MobileCode class="border p-3 bg-gray-50" v-model:mobile="form.mobile" v-model:code="form.code" />
      <el-button type="primary" size="default" @click="bindMobile(form)" class="mt-3">保存提交</el-button>
    </HdCard>
  </main>
</template>

<style lang="scss"></style>
