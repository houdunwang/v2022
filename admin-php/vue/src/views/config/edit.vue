<script setup lang="ts">
import { getSystem, updateSystem } from '@/apis/system'
import { systemField } from '@/config/form'
import router from '@/router'
import systemStore from '@/store/systemStore'
import { ElMessage } from 'element-plus'
const data = await getSystem()

console.log(data)
const model = ref(data)
const storeSystem = systemStore()
const onSubmit = async () => {
  await updateSystem(model.value)
  storeSystem.load()
  ElMessage.success('保存成功')
  router.push({ name: 'system.index' })
}

const tabModel = ref('site')
</script>

<template>
  <HdTab
    :tabs="[
      { label: '站点列表', route: { name: 'site.index' } },
      { label: '系统设置', route: { name: 'system.index' } },
      { label: '网站配置', route: { name: 'config.edit' }, current: true },
    ]" />
  <el-tabs v-model="tabModel" type="border-card" tab-position="top" @tab-click="">
    <el-tab-pane label="网站配置" name="site">
      <FormFieldList :model="model.config.site" @submit="onSubmit" :fields="systemField.site"> ></FormFieldList>
    </el-tab-pane>
    <el-tab-pane label="验证码" name="code">
      <FormFieldList :model="model.config.code" @submit="onSubmit" :fields="systemField.code"> ></FormFieldList>
    </el-tab-pane>
    <el-tab-pane label="阿里云" name="aliyun">
      <FormFieldList :model="model.config.aliyun" @submit="onSubmit" :fields="systemField.aliyun"> ></FormFieldList>
    </el-tab-pane>
    <el-tab-pane label="用户头像" name="avatar">
      <FormFieldList :model="model.config.avatar" @submit="onSubmit" :fields="systemField.avatar"> ></FormFieldList>
    </el-tab-pane>
  </el-tabs>
</template>

<style lang="scss"></style>
