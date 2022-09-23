import { http } from '@/plugins/axios'
import { ref } from 'vue'

export default () => {
  const collection = ref<ApiPage<LessonModel>>()
  const lesson = ref<LessonModel>()

  const findAll = async (page = 1) => {
    collection.value = await http.request<LessonModel, ApiPage<LessonModel>>({
      url: `lesson?page=${page}`,
    })
  }

  const findOne = async (id: number) => {
    lesson.value = await http
      .request<LessonModel>({
        url: `lesson/${id}`,
      })
      .then((r) => r.data)
  }
  return { findAll, collection, findOne, lesson }
}
