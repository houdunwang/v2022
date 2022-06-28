<script setup lang="ts">
import { getModuleList } from '@/apis/module'
import { ModuleTableField } from '@/config/table'

const emit = defineEmits<{
  (e: 'select', module: ModuleModel): void
}>()

const dialogState = ref(false)

const action = (model: any, command: string) => {
  const module = model as ModuleModel
  emit('select', module)
  dialogState.value = false
}
</script>

<template>
  <div class="">
    <el-dialog title="选择模块" v-model="dialogState" width="95%" top="20px">
      <HdTableList
        :api="getModuleList"
        :columns="ModuleTableField"
        :search="true"
        :button="[{ command: 'select', title: '选择', type: 'default' }]"
        @action="action"
        :button-width="90" />
    </el-dialog>

    <el-button type="primary" size="default" @click="dialogState = true">选择模块</el-button>
  </div>
</template>

<style lang="scss"></style>
