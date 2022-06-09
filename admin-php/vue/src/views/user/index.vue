<script setup lang="ts">
import { getUserList } from '@/apis/userApi'
import { TableButton, UserTableField } from '@/config/table'
import router from '@/router'
import tabs from './tabs'

const buttons = [
  { command: 'show', title: '显示', type: 'danger' },
  { command: 'edit', title: '编辑', type: 'default' },
] as TableButton[]

const action = (model: any, command: string) => {
  const user = model as UserModel
  switch (command) {
    case 'show':
      router.push({
        name: 'user.show',
        params: { id: user.id },
      })
      break
    case 'edit':
      break
  }
}
</script>

<template>
  <hd-tab :tabs="tabs" />
  <HdTableList :columns="UserTableField" :button="buttons" :api="getUserList" @action="action" :button-width="150" />
</template>
