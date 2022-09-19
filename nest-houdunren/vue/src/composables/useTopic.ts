import { http } from '@/plugins/axios'
import { ref } from 'vue'

export default () => {
  const collection = ref<ApiPage<TopicModel>>()
  const getAll = async (page = 1) => {
    collection.value = await http.request<TopicModel, ApiPage<TopicModel>>({
      url: `topic?page=${page}`,
    })
  }

  return { collection, getAll }
}
