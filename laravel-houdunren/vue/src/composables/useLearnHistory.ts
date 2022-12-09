import { http } from '@/plugins/axios'
export default () => {
  const collection = ref<LearnHistoryModel[]>()
  const findAll = async () => {
    const { data } = await http.request<ApiData<LearnHistoryModel[]>>({
      url: `learnHistory`,
    })

    collection.value = data
  }
  const getByUser = async (uid: any, page: any) => {
    return await http.request<ApiPage<LearnHistoryModel>>({
      url: `learnHistory/${uid}?page=${page}`,
    })
  }
  return { findAll, collection, getByUser }
}
