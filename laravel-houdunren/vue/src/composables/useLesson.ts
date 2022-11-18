import { ElMessageBox } from 'element-plus'
import { http } from '@/plugins/axios'
import router from '@/router'
export default () => {
  const collection = ref<ApiPage<LessonModel>>()

  const model = ref<LessonModel>()
  const getAll = async (page = any, row = 10) => {
    collection.value = await http.request<ApiPage<LessonModel>>({
      url: `lesson?page=${page}&row=${row}`,
    })
  }

  const find = async (id: any) => {
    const { data } = await http.request<ApiData<LessonModel>>({
      url: `lesson/${id}`,
    })
    model.value = data
    return data
  }

  const update = async (data: any) => {
    await http.request<ApiData<LessonModel>>({
      url: `lesson/${data.id}`,
      method: 'PUT',
      data,
    })
    router.push({ name: 'admin.lesson.index' })
  }

  const add = async (data: any) => {
    await http.request<ApiData<LessonModel>>({
      url: `lesson`,
      method: 'POST',
      data,
    })
    router.push({ name: 'admin.lesson.index' })
  }

  const del = async (id: any) => {
    try {
      await ElMessageBox.confirm('确定删除吗？', '温馨提示')
      await http.request<ApiData<LessonModel>>({
        url: `lesson/${id}`,
        method: 'DELETE',
      })
      location.reload()
    } catch (error) {}
  }

  const removeVideo = (videos: any, index: number) => {
    videos.splice(index, 1)
  }
  const addVideo = (videos: any) => {
    videos.push({ title: '', path: '' })
  }
  return { collection, getAll, find, model, update, del, add, removeVideo, addVideo }
}
