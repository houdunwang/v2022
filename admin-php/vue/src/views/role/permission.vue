<script setup lang="ts">
import { roleFind } from '@/apis/role'
import Tab from './tab.vue'
const { sid, rid } = defineProps<{ sid: any; rid: any }>()
const role = $ref(await roleFind(sid, rid))
</script>

<template>
  <Tab :role="role" :sid="sid" />
  <role-permission :sid="sid" :rid="rid" />
</template>

<style lang="scss" scoped></style>
