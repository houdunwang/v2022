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
</script>

<template>
  <HdTab
    :tabs="[
      { label: '站点列表', route: { name: 'site.index' } },
      { label: '修改站点', route: { name: 'site.edit' }, current: true },
    ]" />
  <FormFieldList :model="model" @submit="onSubmit" :fields="siteField.base"> ></FormFieldList>
</template>
