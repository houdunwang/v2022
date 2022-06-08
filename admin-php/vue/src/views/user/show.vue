<script setup lang="ts">
import { findUser } from '@/apis/userApi'
import { UserField } from '@/config/form'
const route = useRoute()
const user = ref(await findUser(route.params.id))
</script>

<template>
  <HdTab
    :tabs="[
      { label: '系统管理', route: { name: 'system.index' } },
      { label: `【${user.name}】用户信息`, route: { name: 'user.show' } },
    ]" />
  <FormFieldList :fields="UserField" :model="user">
    <template #button>
      <el-button type="primary" size="default" @click="$router.push({ name: 'user.index' })">返回用户列表</el-button>
    </template>
  </FormFieldList>
</template>

<style lang="scss"></style>
