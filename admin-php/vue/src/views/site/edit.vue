<script setup lang="ts">
import { apiSiteFind, apiSiteUpdate } from '@/apis/site'
import router from '@/router'
import { siteField } from '@/config/form'
const route = useRoute()
const model = ref(await apiSiteFind(route.params?.id))
const onSubmit = async () => {
  await apiSiteUpdate(model.value)
  router.push({ name: 'site.index' })
}
const tabModel = ref('base')
</script>

<template>
  <HdTab
    :tabs="[
      { label: '站点列表', route: { name: 'site.index' } },
      { label: '修改站点', route: { name: 'site.edit' }, current: true },
    ]" />
  <el-tabs v-model="tabModel" type="border-card" tab-position="top" @tab-click="">
    <el-tab-pane label="基本信息" name="base">
      <FormFieldList :model="model" @submit="onSubmit" :fields="siteField.base"> ></FormFieldList>
    </el-tab-pane>
    <el-tab-pane label="网站配置" name="site">
      <FormFieldList :model="model.config.site" @submit="onSubmit" :fields="siteField.site"> ></FormFieldList>
    </el-tab-pane>
    <el-tab-pane label="阿里云" name="aliyun">
      <FormFieldList :model="model.config.aliyun" @submit="onSubmit" :fields="siteField.aliyun"> ></FormFieldList>
    </el-tab-pane>
  </el-tabs>
</template>
