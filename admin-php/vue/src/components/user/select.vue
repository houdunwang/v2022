<script setup lang="ts">
import { UserTableField } from '@/config/table'
import { getUserList } from '@/apis/userApi'

const emit = defineEmits<{
  (e: 'select', user: UserModel): void
}>()
const dialogState = ref(false)

const action = (model: any, command: string) => {
  const user = model as UserModel
  emit('select', user)
  dialogState.value = false
}
</script>

<template>
  <div class="">
    <el-dialog title="选择用户" v-model="dialogState" width="95%" top="20px">
      <HdTableList
        :api="getUserList"
        :columns="UserTableField"
        :search="true"
        :button="[{ command: 'select', title: '选择', type: 'default' }]"
        @action="action"
        :button-width="90" />
    </el-dialog>

    <el-button type="primary" size="default" @click="dialogState = !dialogState">选择用户</el-button>
  </div>
</template>

<style lang="scss"></style>
