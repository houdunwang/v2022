<script setup lang="ts">
import { IosFaceRecognition } from '@icon-park/vue-next'
import CommentItem from './comment-item.vue'
const route = useRoute()
const { isLogin } = useAuth()
const { add, collection, findAll } = useComment()
const { type, id } = defineProps<{ type: string; id: number }>()
const form = reactive({ content: '', type, id })

await findAll(type, id)
const onSubmit = async () => {
  const comment = await add(form)
  collection.value?.push(comment)
  form.content = ''
}

onMounted(() => {
  const el = document.querySelector('#comment-' + route.query.commentId)
  console.log(el)
  if (el) el.scrollIntoView({ block: 'start', behavior: 'smooth' })
})
</script>

<template>
  <main class="">
    <HdCard>
      <template #header>评论</template>
      <CommentItem
        v-for="comment of collection"
        :key="comment.id"
        :comment="comment"
        :type="type"
        :id="id"
        :collection="collection">
        <CommentItem
          v-for="reply of comment.replys"
          :key="reply.id"
          :comment="reply"
          :type="type"
          :id="id"
          :collection="collection"
          class="ml-8 bg-gray-50" />
      </CommentItem>
      <div class="mt-5" v-if="isLogin()">
        <HdMarkdownEditor v-model="form.content" />
        <HdError name="content" />
        <el-button type="primary" size="default" @click="onSubmit" class="mt-2">发表</el-button>
      </div>
      <div class="flex justify-center" v-else>
        <el-button type="primary" size="default" @click="$router.push({ name: 'login' })">登录后发表</el-button>
      </div>
    </HdCard>
  </main>
</template>

<style lang="scss"></style>
