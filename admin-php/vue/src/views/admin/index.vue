<script setup lang="ts">
import { getAdminList, removeAdmin, syncAdmin } from '@/apis/admin'
import { UserTableField } from '@/config/table'
import { ElMessageBox } from 'element-plus'
const route = useRoute()
const site = route.params.site as unknown as number
const getList = async (page = 1, params: any) => {
  return await getAdminList(page, site, params)
}
const userTableList = ref(1)

const select = async (user: UserModel) => {
  await syncAdmin(site, user.id)
  userTableList.value++
}

const remove = async (user: any, command: string) => {
  try {
    await ElMessageBox.confirm('确定删除吗')
    await removeAdmin(site, user.id)
    userTableList.value++
  } catch (error) {}
}
</script>

<template>
  <HdTab
    :tabs="[
      { label: '站点列表', route: { name: 'site.index' } },
      { label: '管理员', route: { name: 'admin.index' }, current: true },
    ]" />
  <UserSelect class="mb-2" @select="select" />
  <HdTableList
    :key="userTableList"
    :api="getList"
    :columns="UserTableField"
    :search="true"
    :button="[{ title: '删除', command: 'remove', type: 'danger' }]"
    :button-width="90"
    @action="remove" />
</template>

<style lang="scss"></style>
