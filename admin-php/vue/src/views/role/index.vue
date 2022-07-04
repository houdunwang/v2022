<script setup lang="ts">
import { getRoleList, delRole } from '@/apis/role'
import { RoleTableField } from '@/config/table'
import { ElMessageBox } from 'element-plus'
import Tab from './tab.vue'
const { sid } = defineProps<{ sid: any }>()

const getRoles = async () => {
  return await getRoleList(sid)
}

let tableKey = $ref(0)
const removeRole = async (model: RoleModel) => {
  await ElMessageBox.confirm('确定删除吗？')
  await delRole(sid, model.id)
  tableKey++
}
</script>

<template>
  <Tab :sid="sid" />

  <HdTableList
    :api="getRoles"
    :columns="RoleTableField"
    :search="true"
    search-field="title"
    :key="tableKey"
    :button-width="210">
    <template #button="{ model }">
      <el-button-group>
        <el-button type="danger" size="default" @click="removeRole(model)">删除</el-button>
        <el-button
          type="success"
          size="default"
          @click="$router.push({ name: 'role.edit', params: { sid, id: model.id } })">
          编辑
        </el-button>
        <RolePermission :sid="sid" :rid="model.id" @change="tableKey++" />
      </el-button-group>
    </template>
  </HdTableList>
</template>

<style lang="scss"></style>
