<script setup lang="ts">
import { getRoleList, delRole } from '@/apis/role'
import { adminFind, setAdminRole } from '@/apis/admin'
import Tab from './tab.vue'
const router = useRouter()
const { sid, id } = defineProps<{ sid: any; id: any }>()

const admin = $ref(await adminFind(sid, id))
const roles = $ref(await getRoleList(sid))

const roleIds = $ref<number[]>([])
admin.roles?.map((role) => {
  roleIds.push(role.id)
})

const onSubmit = async () => {
  try {
    await setAdminRole(sid, id, roleIds)
    router.push({ name: 'site.admin.index', params: { sid } })
  } catch (error) {}
}
</script>

<template>
  <Tab :sid="sid" />

  <div class="role">
    <label v-for="role of roles.data" :key="role.id">
      <input type="checkbox" v-model="roleIds" :value="role.id" />
      {{ role.title }}
    </label>
  </div>

  <el-button type="primary" size="default" @click="onSubmit">保存提交</el-button>
</template>

<style lang="scss" scoped>
div.role {
  @apply p-3 border rounded-sm bg-white shadow-sm mb-3 flex gap-3;
  label {
    @apply flex items-center gap-1 text-sm text-gray-700;
  }
}
</style>
