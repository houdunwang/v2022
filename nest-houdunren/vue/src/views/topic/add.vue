<script setup lang="ts">
import { reactive } from 'vue'
import Markdown from '@/components/hd/markdown.vue'
import useTopic from '@/composables/useTopic'
import router from '@/router'
import HdError from '@/components/hd/error.vue'
const topic = reactive({
  title: '',
  content: '',
})
const { add } = useTopic()
const onSubmit = async () => {
  await add(topic)
  router.push({ name: 'topic.index' })
}
</script>

<template>
  <el-form size="large">
    <el-card shadow="always" :body-style="{ padding: '20px' }">
      <template #header>
        <div>发表贴子</div>
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
