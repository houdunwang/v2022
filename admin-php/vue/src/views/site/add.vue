<script setup lang="ts">
import { apiSiteAdd } from '@/apis/site'
import { siteField } from '@/config/form'
import router from '@/router'

const onSubmit = async (model: SiteModel) => {
  await apiSiteAdd(model)
  router.push({ name: 'site.index' })
}
</script>

<template>
  <HdTab
    :tabs="[
      { label: '站点列表', route: { name: 'site.index' } },
      { label: '修改站点', route: { name: 'site.edit' }, current: true },
    ]" />
  <FormFieldList @submit="onSubmit" :fields="siteField.base"> ></FormFieldList>
</template>
