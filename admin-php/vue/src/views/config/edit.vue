<script setup lang="ts">
import { getConfig, updateConfig } from '@/apis/configApi'
import router from '@/router'
import systemStore from '@/store/systemStore'
import { ElMessage } from 'element-plus'
const { data } = await getConfig()
console.log(data)
const model = ref(data)
const storeSystem = systemStore()
const onSubmit = async () => {
  await updateConfig(model.value)
  storeSystem.load()
  ElMessage.success('保存成功')
  router.push({ name: 'system.index' })
}

const tabModel = ref('site')
</script>

<template>
  <!-- <HdTab
    :tabs="[
      { label: '站点列表', route: { name: 'site.index' } },
      { label: '系统设置', route: { name: 'system.index' } },
      { label: '网站配置', route: { name: 'config.edit' }, current: true },
    ]" /> -->
  <el-tabs v-model="tabModel" type="border-card" tab-position="top" @tab-click="">
    <el-tab-pane label="网站配置" name="site">
      <FormFieldList
        :model="model.site"
        @submit="onSubmit"
        :fields="[
          { title: '网站名称', name: 'title', error_name: 'site.title' },
          { title: '版权信息', name: 'copyright', error_name: 'site.copyright' },
          { title: '网站标志', name: 'logo', type: 'image', error_name: 'site.logo' },
        ]">
        ></FormFieldList
      >
    </el-tab-pane>
    <el-tab-pane label="验证码" name="code">
      <FormFieldList
        :model="model.code"
        @submit="onSubmit"
        :fields="[
          { title: '有效期', name: 'expire', error_name: 'code.expire', placeholder: '验证码有效期，单位为秒' },
          { title: '间隔时间', name: 'timeout', error_name: 'code.timeout' },
          { title: '数量', name: 'length', error_name: 'code.length' },
        ]">
        ></FormFieldList
      >
    </el-tab-pane>
    <el-tab-pane label="阿里云" name="aliyun">
      <FormFieldList
        :model="model.aliyun"
        @submit="onSubmit"
        :fields="[
          { title: 'key', name: 'access_key_id', error_name: 'aliyun.access_key_id' },
          { title: 'secret', name: 'access_key_secret', error_name: 'aliyun.access_key_secret' },
          { title: '短信签名', name: 'sms_sign_name', error_name: 'aliyun.sms_sign_name' },
        ]">
        ></FormFieldList
      >
    </el-tab-pane>
    <el-tab-pane label="用户头像" name="avatar">
      <FormFieldList
        :model="model.avatar"
        @submit="onSubmit"
        :fields="[
          { title: '宽度', name: 'avatar_crop_width', error_name: 'avatar.avatar_crop_width' },
          { title: '高度', name: 'avatar_crop_height', error_name: 'avatar.avatar_crop_height' },
        ]">
        ></FormFieldList
      >
    </el-tab-pane>
  </el-tabs>
</template>

<style lang="scss"></style>
