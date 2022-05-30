<script setup lang="ts">
import fields from './fields'
import Tab from './components/tab.vue'
import { apiSiteAdd } from '@/apis/apiSite'
import router from '@/router'

const model = ref({})

const onSubmit = async () => {
  await apiSiteAdd(model.value)
  router.push({ name: 'site.index' })
}
</script>

<template>
  <Tab />
  <FormFieldList :fields="fields" :model="model" @submit="onSubmit" />
</template>
