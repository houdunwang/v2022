<script setup lang="ts">
import { getConfig, updateConfig } from '@/apis/configApi'
import systemStore from '@/store/systemStore'
import { ElMessage } from 'element-plus'
const { data } = await getConfig()

const model = ref(data)
const storeSystem = systemStore()
const onSubmit = async () => {
  await updateConfig(model.value)
  storeSystem.load()
  ElMessage.success('保存成功')
}
</script>

<template>
  <HdTab
    :tabs="[
      { label: '站点列表', route: { name: 'site.index' } },
      { label: '系统设置', route: { name: 'system.index' } },
      { label: '网站配置', route: { name: 'config.edit' }, current: true },
    ]" />

  <FormFieldList
    :model="model.site"
    @submit="onSubmit"
    :fields="[
      { title: '网站名称', name: 'title', error_name: 'site.title' },
      { title: '版权信息', name: 'copyright', error_name: 'site.copyright' },
      { title: '网站标志', name: 'logo', type: 'image', error_name: 'site.logo' },
    ]" />
</template>

<style lang="scss"></style>
