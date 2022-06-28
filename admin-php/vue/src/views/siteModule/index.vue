<script setup lang="ts">
import { apiSiteFind } from '@/apis/site'
import { addSiteModule, getSiteModuleList } from '@/apis/siteModule'
import { ModuleTableField } from '@/config/table'
import { delSiteModule, setSiteDefaultModule } from '@/apis/siteModule'
const { sid } = defineProps<{
  sid: any
}>()

const site = await apiSiteFind(sid)
let tableKey = $ref(0)

const selectModule = async (module: ModuleModel) => {
  try {
    await addSiteModule(site.id, module.id)
    tableKey++
  } catch (error) {}
}

const getModules = async (page = 1) => {
  return getSiteModuleList(sid, page)
}

const action = async (module: ModuleModel, command: string) => {
  switch (command) {
    case 'del':
      try {
        await delSiteModule(sid, module.id)
        tableKey++
      } catch (error) {}
      break
    case 'default':
      await setSiteDefaultModule(sid, module.id)
      break
  }
}
</script>

<template>
  <HdTab
    :tabs="[
      { label: '站点列表', route: { name: 'site.index' } },
      { label: `【${site.title}】模块设置`, route: { name: 'site.module.index' } },
    ]" />

  <ModuleSelectModule @select="selectModule" class="mb-2" />
  <HdTableList
    :api="getModules"
    :columns="ModuleTableField"
    :key="tableKey"
    :button="[
      { title: '删除', command: 'del', type: 'danger' },
      { title: '设为默认', command: 'default', type: 'success' },
    ]"
    @action="action">
  </HdTableList>
</template>

<style lang="scss"></style>
