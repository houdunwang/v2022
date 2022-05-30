<script setup lang="ts">
import { apiSiteFind, apiSiteUpdate } from '@/apis/apiSite'
import fields from './fields'
import Tab from './components/tab.vue'
import router from '@/router'
const route = useRoute()
const model = ref(await apiSiteFind(route.params?.id as unknown as number).then((r) => r.data))
const onSubmit = async () => {
  await apiSiteUpdate(model.value)
  router.push({ name: 'site.index' })
}
</script>

<template>
  <Tab />
  <FormFieldList :fields="fields" :model="model" @submit="onSubmit" />
</template>
