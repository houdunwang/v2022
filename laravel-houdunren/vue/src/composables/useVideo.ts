import { http } from '@/plugins/axios'
export default () => {
  const collection = ref<ApiPage<VideoModel>>()
  const model = ref<VideoModel>()
  const getAll = async () => {
    collection.value = await http.request<ApiPage<VideoModel>>({
      url: 'video',
    })
  }

  const find = async (id: any) => {
    const { data } = await http.request<ApiData<VideoModel>>({
      url: `video/${id}`,
    })
    model.value = data
  }

  return { collection, getAll, find, model }
}
