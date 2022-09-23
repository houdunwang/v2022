import { Patch } from '@nestjs/common'
import { http } from '@/plugins/axios'
import { ref } from 'vue'

export default () => {
  const collection = ref<ApiPage<TopicModel>>()
  const topic = ref<TopicModel>()
  const findAll = async (page = 1) => {
    collection.value = await http.request<TopicModel, ApiPage<TopicModel>>({
      url: `topic?page=${page}`,
    })
  }
  const add = async (data: any) => {
    await http.request({
      url: 'topic',
      method: 'POST',
      data,
    })
  }

  const update = async (data: any) => {
    await http.request({
      url: `topic/${data.id}`,
      method: 'Patch',
      data,
    })
  }

  const findOne = async (id: number) => {
    topic.value = await http
      .request<TopicModel>({
        url: `topic/${id}`,
      })
      .then((r) => r.data)
  }
  return { collection, findAll, add, findOne, topic, update }
}
