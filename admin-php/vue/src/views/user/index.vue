<script setup lang="ts">
import { getUserList } from '@/apis/userApi'
import tabs from './tabs'
const { data } = await getUserList()
</script>

<template>
  <hd-tab :tabs="tabs" />
  <user-list :users="data" />
</template>
