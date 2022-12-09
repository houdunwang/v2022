import { ElMessageBox } from 'element-plus'
import { http } from '@/plugins/axios'
export default () => {
  const collection = ref<CommentModel[]>()

  const findAll = async (type: string, id: any) => {
    const { data } = await http.request<ApiData<CommentModel[]>>({
      url: `comment/${type}/${id}`,
    })
    collection.value = data
  }

  const add = async (data: any) => {
    const { data: comment } = await http.request<ApiData<CommentModel>>({
      url: `comment/${data.type}/${data.id} `,
      method: 'POST',
      data,
    })
    return comment
  }

  const del = async (id: any) => {
    try {
      await ElMessageBox.confirm('确定删除吗？', '温馨提示')
      await http.request<ApiData<CommentModel>>({
        url: `comment/${id} `,
        method: 'DELETE',
      })
      location.reload()
    } catch (error) {}
  }
  return { add, findAll, collection, del }
}
