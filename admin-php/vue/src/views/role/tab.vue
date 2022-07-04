<script setup lang="ts">
import useSite from '@/composables/useSite'

const { sid, role } = defineProps<{ sid: any; role?: any }>()

const { site } = await useSite()
</script>

<template>
  <HdTab
    :tabs="[
      { label: '角色列表', route: { name: 'role.index' } },
      {
        label: '添加角色',
        route: { name: 'role.add', params: { sid } },
        permission: { name: 'system-add-role', site },
      },
      { label: '编辑角色', route: { name: 'role.edit' }, current: true },
      { label: `【${role?.title}】角色权限设置`, route: { name: 'role.permission' }, current: true },
      { label: '管理员列表', route: { name: 'site.admin.index', params: { sid } } },
    ]" />
</template>
