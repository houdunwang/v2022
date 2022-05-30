<script setup lang="ts">
const tabs = ref([
  { label: '站点列表', route: { name: 'admin' } },
  { label: '添加站点', route: { name: 'site.add' } },
  { label: '编辑站点', route: { name: 'site.edit' }, current: true },
])
</script>

<template>
  <HdTab :tabs="tabs" />
</template>
