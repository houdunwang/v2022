<script setup lang="ts">
import { apiGetSiteGet, apiSiteDelete, ISite } from '@/apis/apiSite'

const sites = ref<ISite[]>()
const load = async () => {
  sites.value = await apiGetSiteGet().then((r) => r.data)
}
await load()

const del = async (id: number) => {
  await apiSiteDelete(id)
  load()
}
</script>

<template>
  <div class="">
    <div class="mb-3">
      <el-button type="primary" size="default" @click="$router.push({ name: 'site.add' })"> 添加站点</el-button>
    </div>
    <SiteItem v-for="site in sites" class="mb-3" :site="site" @del="del" />
  </div>
</template>

<style lang="scss"></style>
