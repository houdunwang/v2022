import { http } from '@/plugins/axios'
export default () => {
  const model = ref<UserModel>()
  const find = async (uid: any) => {
    const { data } = await http.request<ApiData<UserModel>>({
      url: `user/${uid}`,
    })
    model.value = data
  }

  const update = async (data: any) => {
    await http.request({
      url: `user/${data.id}`,
      data,
      method: 'PUT',
    })
    location.reload()
  }

  const bindMobile = async (data: any) => {
    await http.request({
      url: `user/mobile`,
      data,
      method: 'POST',
    })
    location.reload()
  }
  return { find, model, update, bindMobile }
}
