<script setup lang="ts">
import { getUserList } from '@/apis/userApi'
import { UserTableField } from '@/config/table'
import tabs from './tabs'
</script>

<template>
  <hd-tab :tabs="tabs" />
  <HdTableList :columns="UserTableField" :api="getUserList" :button-width="90">
    <template #button="{ user }">
      <UserInfo :id="user.id" />
    </template>
  </HdTableList>
</template>
