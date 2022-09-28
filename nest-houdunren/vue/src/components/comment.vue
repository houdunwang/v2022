<script setup lang="ts">
import useComment from '@/composables/useComment'
import MarkdownPreview from '@/components/hd/markdownPreview.vue'
import dayjs from 'dayjs'
import { defineProps, reactive, ref } from 'vue'
import Markdown from '@/components/hd/markdown.vue'
import { ElMessage } from 'element-plus'
import useUtil from '@/composables/system/useUtil'
import { ShareThree, Delete } from '@icon-park/vue-next'
import Avatar from './avatar.vue'
import userStore from '@/store/userStore'
const { user } = userStore()
const { isLogin } = useUtil()
const { type, id } = defineProps<{
  type: 'topic' | 'video'
  id: any
}>()

const { collection, findAll, add, replyComment } = useComment()

await findAll(type, id)
const editorId = ref(0)
const form = reactive({
  content: '',
  topicId: type == 'topic' ? id : undefined,
  videoId: type == 'video' ? id : undefined,
})
const comment = ref<CommentModel>()

const onSubmit = async () => {
  if (comment.value) {
    if (comment.value.User.id == user?.id) return ElMessage.error('不能回复自己')
    replyComment({
      content: form.content,
      commentId: comment.value.id,
    })
  } else await add(form)

  form.content = ''
  editorId.value++
  comment.value = undefined
  await findAll(type, id)
  ElMessage.success('发表成功')
}

const reply = (replyComment: CommentModel) => {
  comment.value = replyComment
  document.querySelector('.reply')?.scrollIntoView({ block: 'end', behavior: 'smooth' })
}
</script>

<template>
  <main>
    <section v-for="comment of collection" :key="comment.id" class="bg-white mb-3 p-3 rounded-sm shadow-sm border">
      <div class="flex justify-between items-center border-b py-2 mb-2">
        <Avatar :user="comment.User">
          <span class="text-xs text-gray-600"> 发表于 {{ dayjs(comment.createdAt).fromNow() }} </span>
        </Avatar>
        <!-- <div class="flex gap-2 items-center">
          <el-image :src="comment.User.avatar" fit="cover" :lazy="true" class="w-8 h-8 rounded-sm" />
          <div class="flex flex-col">
            {{ comment.User.name }}
            <span class="text-xs text-gray-600"> 发表于 {{ dayjs(comment.createdAt).fromNow() }} </span>
          </div>
        </div> -->

        <div>
          <ShareThree
            theme="outline"
            size="20"
            class="text-gray-500 hover:text-green-700 cursor-pointer"
            @click="reply(comment)" />
        </div>
      </div>
      <div class="opacity-90">
        <MarkdownPreview :text="comment.content" />
      </div>

      <div class="bg-gray-100 p-3 -mx-3 -mb-3" v-if="comment.Reply.length">
        <div class="pl-10 py-3 mb-3 border-b" v-for="reply of comment.Reply" :key="reply.id">
          <Avatar :user="reply.user">
            <span class="text-xs text-gray-600"> 发表于 {{ dayjs(reply.createdAt).fromNow() }} </span>
          </Avatar>
          <div class="text-sm">{{ reply.content }}</div>
        </div>
      </div>
    </section>

    <!-- 发表评论框 -->
    <section class="bg-white p-3 reply" v-if="isLogin()">
      <div class="border-b mb-2 py-3 flex gap-2 items-center cursor-pointer" v-if="comment">
        回复 【{{ comment?.User.name }}】
        <Delete theme="outline" size="24" fill="#7ed321" @click="comment = undefined" />
      </div>
      <Markdown v-model="form.content" :key="editorId" />
      <el-button type="primary" size="default" @click="onSubmit" class="mt-3">发表评论</el-button>
    </section>
    <section v-else class="bg-white p-5 flex justify-center">
      <el-button type="primary" size="default" @click="$router.push({ name: 'login' })"> 登录后发表评论</el-button>
    </section>
  </main>
</template>

<style lang="scss"></style>
