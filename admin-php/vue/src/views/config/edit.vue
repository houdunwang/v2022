<script setup lang="ts">
const model = ref({})
</script>

<template>
  <HdTab
    :tabs="[
      { label: '站点列表', route: { name: 'site.index' } },
      { label: '系统设置', route: { name: 'system.index' } },
      { label: '网站配置', route: { name: 'config.edit' }, current: true },
    ]" />

  <FormFieldList
    :fields="[
      { title: '网站名称', name: 'title' },
      { title: '网站标志', name: 'logo', type: 'image' },
    ]"
    :model="model" />
</template>

<style lang="scss"></style>
