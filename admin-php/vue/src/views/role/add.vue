<script setup lang="ts">
import Tab from './tab.vue'
import { RoleForm } from '@/config/form'
import { addRole } from '@/apis/role'
const router = useRouter()

const { sid } = defineProps<{ sid: any }>()

const onSubmit = async (model: RoleModel) => {
  try {
    await addRole(sid, model)
    router.push({ name: 'role.index', params: { sid } })
  } catch (error) {}
}
</script>

<template>
  <Tab :sid="sid" />
  <FormFieldList :fields="RoleForm" @submit="onSubmit" />
</template>

<style lang="scss"></style>
