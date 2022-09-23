<script setup lang="ts">
import Markdown from '@/components/hd/markdown.vue'
import useTopic from '@/composables/useTopic'
import router from '@/router'
import HdError from '@/components/hd/error.vue'
import { useRoute } from 'vue-router'
import { update } from 'lodash'
import { ElMessage } from 'element-plus'
const route = useRoute()
const { topic, findOne, update } = useTopic()
await findOne(+route.params.id)
const onSubmit = async () => {
  await update(topic.value)
  ElMessage.success('修改成功')
  router.push({ name: 'topic.show', params: { id: topic.value?.id } })
}
</script>

<template>
  <el-form size="large">
    <el-card shadow="always" :body-style="{ padding: '20px' }">
      <template #header>
        <div>修改贴子</div>
      </template>

      <el-input v-model="topic.title" placeholder=" 请输入贴子标题" />
      <HdError name="title" />
      <div class="mt-3">
        <Markdown v-model="topic.content" />
        <HdError name="content" />
      </div>

      <el-button type="primary" size="default" @click="onSubmit">发表</el-button>
    </el-card>
  </el-form>
</template>

<style lang="scss"></style>
