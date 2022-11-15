import { http } from '@/plugins/axios'
export default () => {
  const collection = ref<VideoModel[]>()
  const model = ref<VideoModel>()
  const getAll = async () => {
    const { data } = await http.request<ApiData<VideoModel[]>>({
      url: 'system',
    })

    collection.value = data
  }

  const find = async (id: any) => {
    const { data } = await http.request<ApiData<VideoModel>>({
      url: `video/${id}`,
    })
    model.value = data
  }

  return { collection, getAll, find, model }
}
