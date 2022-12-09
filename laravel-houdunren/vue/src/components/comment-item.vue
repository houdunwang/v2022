<script setup lang="ts">
import dayjs from 'dayjs'
import UserItem from './user-item.vue'
const { authorize } = useAuth()
const { add, del } = useComment()
const { comment, type, id, collection } = defineProps<{
  comment: CommentModel
  type: string
  id: number
  collection?: CommentModel[]
}>()
const form = reactive({
  content: '',
  type,
  id,
  comment_id: comment.comment_id ?? comment.id,
  reply_user_id: comment.user.id,
})
const showReplyBox = ref(false)

const onSubmit = async () => {
  const comment = await add(form)
  collection?.find((c) => c.id == comment.comment_id)?.replys.push(comment)
  form.content = ''
  showReplyBox.value = false
}
</script>

<template>
  <main :id="`comment-${comment.id}`">
    <section class="border mt-3 rounded-sm p-2">
      <div class="flex justify-between items-center border-b pb-2">
        <section class="flex gap-2">
          <div class="flex items-center">
            <UserItem :user="comment.user" />
          </div>
          <div class="flex flex-col justify-between">
            <div class="flex text-sm">
              {{ comment.user.name }}
              <div v-if="comment.reply_user_id" class="flex items-center">
                <icon-right-c theme="outline" />
                {{ comment.reply_user?.name }}
              </div>
            </div>
            <div class="flex items-center text-xs text-gray-500 opacity-95">
              <icon-time theme="outline" />
              {{ dayjs(comment.created_at).format('YYYY/DD/MM') }}
            </div>
          </div>
        </section>
        <section class="flex gap-2">
          <icon-comment
            theme="outline"
            size="18"
            class="text-gray-500 cursor-pointer hover:text-gray-800"
            @click="showReplyBox = !showReplyBox" />

          <icon-delete-one theme="outline" size="18" v-if="authorize(comment.user_id)" @click="del(comment.id)" />
        </section>
      </div>
      <HdMarkdownPreview :text="comment.html" />
      <!-- 评价回复 -->
      <div class="" v-if="showReplyBox">
        <el-input
          v-model="form.content"
          type="textarea"
          placeholder="支持使用 markdown 语法"
          size="default"
          clearable></el-input>
        <el-button type="primary" size="small" @click="onSubmit()" class="mt-2">发表</el-button>
      </div>
      <!-- 评价回复 END-->
    </section>
    <slot />
  </main>
</template>

<style lang="scss"></style>
