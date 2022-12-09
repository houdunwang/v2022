import { ElMessageBox } from 'element-plus'
import { http } from '@/plugins/axios'
import router from '@/router'

export default () => {
  const collection = ref<ApiPage<TopicModel>>()
  const model = ref<TopicModel>()

  const getAll = async (args: any) => {
    const queryString = Object.entries(args)
      .map(([v, k]) => `${v}=${k}`)
      .join('&')
    collection.value = await http.request({
      url: `topic?${queryString}`,
    })
  }

  const find = async (id: any) => {
    const { data } = await http.request<ApiData<TopicModel>>({
      url: `topic/${id}`,
    })
    model.value = data
  }

  const add = async (data: any) => {
    const { data: topic } = await http.request<ApiData<TopicModel>>({
      url: `topic`,
      method: 'POST',
      data,
    })
    router.push({ name: 'topic.show', params: { id: topic.id } })
  }

  const update = async (data: any) => {
    const { data: topic } = await http.request<ApiData<TopicModel>>({
      url: `topic/${data.id}`,
      method: 'PUT',
      data,
    })
    router.push({ name: 'topic.show', params: { id: topic.id } })
  }

  const del = async (id: any) => {
    try {
      await ElMessageBox.confirm('确定删除吗？', '温馨提示')
      const { data: topic } = await http.request<ApiData<TopicModel>>({
        url: `topic/${id}`,
        method: 'DELETE',
      })
      router.push({ name: 'topic.index' })
    } catch (error) {}
  }

  return { getAll, collection, model, find, add, update, del }
}
