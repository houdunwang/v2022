<script setup lang="ts">
import Tab from './tab.vue'
import { RoleForm } from '@/config/form'
import { addRole, updateRole, roleFind } from '@/apis/role'
const router = useRouter()

const { sid, id } = defineProps<{ sid: any; id: any }>()

const role = await roleFind(sid, id)

const onSubmit = async (model: RoleModel) => {
  try {
    await updateRole(sid, role)
    router.push({ name: 'role.index', params: { sid } })
  } catch (error) {}
}
</script>

<template>
  <Tab :sid="sid" />
  <FormFieldList :fields="RoleForm" @submit="onSubmit" :model="role" />
</template>

<style lang="scss"></style>
