<script setup lang="ts">
import { getUserList } from '@/apis/userApi'
import { UserTableField } from '@/config/table'
import tabs from './tabs'
</script>

<template>
  <hd-tab :tabs="tabs" />
  <HdTableList :columns="UserTableField" :api="getUserList" :button-width="90" :search="true" search-field="name">
    <template #button="{ model }">
      <UserInfo :id="model.id" />
    </template>
  </HdTableList>
</template>
