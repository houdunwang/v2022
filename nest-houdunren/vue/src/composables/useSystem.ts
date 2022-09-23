import { http } from '@/plugins/axios'
import { ref } from 'vue'

export default () => {
  const collection = ref<SystemModel[]>()
  const system = ref<SystemModel>()

  const findAll = async () => {
    collection.value = await http
      .request<SystemModel[]>({
        url: 'system',
      })
      .then((r) => r.data)
  }

  const findOne = async (id: number) => {
    system.value = await http
      .request<SystemModel>({
        url: `system/${id}`,
      })
      .then((r) => r.data)
  }
  return { findAll, collection, findOne, system }
}
