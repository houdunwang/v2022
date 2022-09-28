import { http } from '@/plugins/axios'
import { ref } from 'vue'

export default () => {
  const collection = ref<CommentModel[]>()

  const findAll = async (key: 'video' | 'topic', id: any) => {
    collection.value = await http
      .request<CommentModel[]>({
        url: `comment?${key}Id=${id}`,
      })
      .then((r) => r.data)
  }

  const add = async (data: any) => {
    await http.request({
      url: 'comment',
      method: 'POST',
      data,
    })
  }

  //回复评论
  const replyComment = async (data: any) => {
    await http.request({
      url: 'reply',
      method: 'POST',
      data,
    })
  }

  return { collection, findAll, add, replyComment }
}
