<script setup lang="ts">
const { sid } = defineProps<{ sid: any }>()
</script>

<template>
  <HdTab
    :tabs="[
      { label: '站点列表', route: { name: 'site.index' } },
      { label: '角色列表', route: { name: 'role.index', params: { sid } } },
      { label: '管理员', route: { name: 'site.admin.index' }, current: true },
    ]" />
</template>

<style lang="scss"></style>
