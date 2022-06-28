<script setup lang="ts">
import { delModule, getModuleList } from '@/apis/module'
import { ModuleTableField } from '@/config/table'
import { ElMessageBox } from 'element-plus'

let tableKey = $ref(0)
const del = async (module: ModuleModel) => {
  await ElMessageBox.confirm('确定删除吗')
  await delModule(module)
  tableKey++
}
</script>
<template>
  <HdTab
    :tabs="[
      { label: '系统管理', route: { name: 'system.index' } },
      { label: '模块列表', route: { name: 'module.index' } },
      { label: '设计模块', route: { name: 'module.design' } },
    ]" />

  <HdTableList :api="getModuleList" :columns="ModuleTableField" :button-width="100" :search="true" :key="tableKey">
    <template #button="{ model }">
      <el-button type="danger" size="default" @click="del(model)">删除</el-button>
    </template>
  </HdTableList>
</template>

<style lang="scss"></style>
