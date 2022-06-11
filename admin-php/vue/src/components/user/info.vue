<script setup lang="ts">
import { findUser } from '@/apis/userApi'
import { UserField } from '@/config/form'
const { id, dialogWidth = '60%' } = defineProps<{
  id?: number
  dialogWidth?: string
}>()
let dialogState = $ref(false)
let user = $ref<UserModel>()

const loadUser = async () => {
  user = await findUser(id!)
  dialogState = true
}
</script>

<template>
  <Teleport to="body">
    <el-dialog title="用户信息" v-model="dialogState" :width="dialogWidth">
      <FormFieldList :fields="UserField" :model="user">
        <template #button />
      </FormFieldList>
    </el-dialog>
  </Teleport>
  <el-button type="primary" size="default" @click="loadUser">查看</el-button>
</template>

<style lang="scss"></style>
