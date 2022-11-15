import { http } from '@/plugins/axios'
export default () => {
  const collection = ref<SystemModel[]>()
  const model = ref<SystemModel>()
  const getAll = async () => {
    const { data } = await http.request<ApiData<SystemModel[]>>({
      url: 'system',
    })

    collection.value = data
  }

  const find = async (id: any) => {
    const { data } = await http.request<ApiData<SystemModel>>({
      url: `system/${id}`,
    })
    model.value = data
  }

  return { collection, getAll, find, model }
}
