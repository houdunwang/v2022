<script setup lang="ts">
import { getAdminList, removeAdmin, syncAdmin, setAdminRole } from '@/apis/admin'
import { AdminTableField } from '@/config/table'
import { ElMessageBox } from 'element-plus'
import Tab from './tab.vue'
const { sid } = defineProps<{ sid: any }>()

const getList = async (page = 1, params: any) => {
  return await getAdminList(page, sid, params)
}
const userTableList = ref(1)

const select = async (user: UserModel) => {
  await syncAdmin(sid, user.id)
  userTableList.value++
}

const remove = async (user: UserModel) => {
  try {
    await ElMessageBox.confirm('确定删除吗')
    await removeAdmin(sid, user.id)
    userTableList.value++
  } catch (error) {}
}

const setRole = async (role: RoleModel, admin: UserModel) => {
  try {
    await setAdminRole(sid, admin.id, role.id)
  } catch (error) {}
}
</script>

<template>
  <Tab :sid="sid" />
  <UserSelect class="mb-2" @select="select" />
  <HdTableList :key="userTableList" :api="getList" :columns="AdminTableField" :search="true" :button-width="150">
    <template #button="{ model }">
      <el-button-group>
        <el-button type="danger" size="default" @click="remove(model)">删除</el-button>
        <el-button
          type="primary"
          size="default"
          @click="$router.push({ name: 'site.admin.role', params: { sid, id: model.id } })">
          角色
        </el-button>
        <!-- <RoleSelect :sid="sid" @select="setRole($event, model)" /> -->
      </el-button-group>
    </template>
  </HdTableList>
</template>

<style lang="scss"></style>
