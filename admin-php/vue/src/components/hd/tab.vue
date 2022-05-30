<script setup lang="ts">
const route = useRoute()
const router = useRouter()
interface ITab {
  label: string
  route?: any
  event?: () => void
  current?: boolean
}

const props = defineProps<{
  tabs: ITab[]
}>()

const tabs = computed(() => {
  return props.tabs.filter((tab) => {
    return tab.current ? tab.route?.name == route.name : true
  })
})

const change = (pane: any) => {
  const tab = props.tabs[pane['index']]

  if (tab.event) tab.event()
  if (tab.route) router.push(tab.route)
}

const active = ref('name' + props.tabs.findIndex((tab) => tab.route?.name == route.name))
</script>

<template>
  <el-tabs v-model="active" type="card" tab-position="top" @tab-click="change">
    <el-tab-pane :label="tab.label" :name="`name${index}`" v-for="(tab, index) of tabs"> </el-tab-pane>
  </el-tabs>
</template>

<style lang="scss"></style>
