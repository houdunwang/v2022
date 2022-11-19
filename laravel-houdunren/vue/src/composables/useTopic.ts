import { http } from '@/plugins/axios'

export default () => {
  const collection = ref<ApiPage<TopicModel>>()
  const model = ref<TopicModel>()

  const getAll = async (page = 1, row = 10) => {
    collection.value = await http.request({
      url: `topic?page=${page}&row=${row}`,
    })
  }

  const find = async (id: any) => {
    const { data } = await http.request<ApiData<TopicModel>>({
      url: `topic/${id}`,
    })
    model.value = data
  }

  return { getAll, collection, model, find }
}
