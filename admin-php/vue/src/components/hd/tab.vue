<script setup lang="ts">
import { access } from '@/utils/helper'

const route = useRoute()
const router = useRouter()
interface ITab {
  label: string
  route?: any
  event?: () => void
  current?: boolean
  permission?: { name: string; site: SiteModel }
}

const props = defineProps<{
  tabs: ITab[]
}>()

const tabs = computed(() => {
  return props.tabs.filter((tab) => {
    const state = tab.current ? tab.route?.name == route.name : true

    return tab.permission ? access(tab.permission.name, tab.permission.site) : state
  })
})

const change = (pane: any) => {
  const tab = tabs.value[pane['index']]

  if (tab.event) tab.event()
  if (tab.route) router.push(tab.route)
}

const active = ref('name' + tabs.value.findIndex((tab) => tab.route?.name == route.name))
</script>

<template>
  <el-tabs v-model="active" type="card" tab-position="top" @tab-click="change">
    <el-tab-pane :label="tab.label" :name="`name${index}`" v-for="(tab, index) of tabs"> </el-tab-pane>
  </el-tabs>
</template>

<style lang="scss" scoped>
:deep(.el-tabs__item) {
  @apply bg-white;
}
:deep(.el-tabs__nav-scroll) {
  border-bottom: solid 1px #ddd;
}
:deep(.el-tabs__header) {
  border-bottom: none !important;
}
</style>
