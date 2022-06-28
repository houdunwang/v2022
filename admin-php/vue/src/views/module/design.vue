<script setup lang="ts">
import { addModule } from '@/apis/module'
import { ModuleForm } from '@/config/form'
const router = useRouter()
const onSubmit = async (module: ModuleModel) => {
  await addModule(module)
  router.push({ name: 'module.index' })
}
</script>

<template>
  <HdTab
    :tabs="[
      { label: '系统管理', route: { name: 'system.index' } },
      { label: '模块列表', route: { name: 'module.index' } },
      { label: '设计模块', route: { name: 'module.design' } },
    ]" />
  <el-card shadow="hover" :body-style="{ padding: '20px' }">
    <FormFieldList :fields="ModuleForm" @submit="onSubmit" />
  </el-card>
</template>

<style lang="scss"></style>
