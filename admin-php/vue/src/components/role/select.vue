<script setup lang="ts">
import { getRoleList, delRole } from '@/apis/role'
import { RoleTableField } from '@/config/table'

const { sid } = defineProps<{ sid: any }>()
const emit = defineEmits(['select'])
let dialog = $ref(false)
let tableKey = $ref(0)

const getRoles = async () => {
  return await getRoleList(sid)
}
const selectRole = async (role: RoleModel) => {
  emit('select', role)
  dialog = false
}
</script>

<template>
  <el-dialog title="角色选择" v-model="dialog" width="80%" append-to-body>
    <HdTableList
      :api="getRoles"
      :columns="RoleTableField"
      :search="true"
      search-field="title"
      :key="tableKey"
      :button-width="90">
      <template #button="{ model }">
        <el-button type="primary" size="default" @click="selectRole(model)"> 选择 </el-button>
      </template>
    </HdTableList>
  </el-dialog>
  <el-button type="primary" size="default" @click="dialog = true">角色</el-button>
</template>

<style lang="scss"></style>
