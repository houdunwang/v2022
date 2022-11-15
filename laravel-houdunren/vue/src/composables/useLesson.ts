import { http } from '@/plugins/axios'
export default () => {
  const collection = ref<LessonModel[]>()
  const model = ref<LessonModel>()
  const getAll = async () => {
    const { data } = await http.request<ApiData<LessonModel[]>>({
      url: 'lesson',
    })

    collection.value = data
  }

  const find = async (id: any) => {
    const { data } = await http.request<ApiData<LessonModel>>({
      url: `lesson/${id}`,
    })
    model.value = data
  }

  return { collection, getAll, find, model }
}
