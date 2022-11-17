import { ElMessageBox } from 'element-plus'
import { http } from '@/plugins/axios'
import router from '@/router'
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

  const add = async (data: any) => {
    await http.request<ApiData<SystemModel>>({
      url: `system`,
      method: 'POST',
      data,
    })
    router.push({ name: 'admin.system.index' })
  }

  const update = async (data: SystemModel) => {
    await http.request<ApiData<SystemModel>>({
      url: `system/${data.id}`,
      method: 'PUT',
      data,
    })
    router.push({ name: 'admin.system.index' })
  }

  const del = async (id: any) => {
    try {
      await ElMessageBox.confirm('确定删除吗？', '温馨提示')
      await http.request<ApiData<SystemModel>>({
        url: `system/${id}`,
        method: 'DELETE',
      })
      location.reload()
    } catch (error) {}
  }

  const order = async () => {
    await http.request<ApiData<SystemModel>>({
      url: `system/order`,
      method: 'POST',
      data: { system: collection.value?.map((s) => s.id) },
    })
  }

  return { collection, getAll, find, model, add, del, update, order }
}
