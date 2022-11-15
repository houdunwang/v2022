import useStorage from '@/composables/hd/useStorage'
import { CacheKey } from '@/enum/CacheKey'
import { http } from '@/plugins/axios'
import userStore from '@/store/hd/useUserStore'
const storage = useStorage()

export default () => {
  //模型权限验证
  function authorize(userId: any) {
    return isAdministrator() || userId == userStore().user?.id
  }

  //超级管理员
  function isAdministrator() {
    return userStore().user?.id == 1
  }

  //登录检测
  function isLogin(): boolean {
    return !!userStore().user
  }

  //退出登录
  async function logout() {
    await http.request({
      url: `auth/logout`,
      method: 'POST',
    })
    location.href = '/'
  }

  const login = async (data: any) => {
    try {
      await http.request({
        url: 'auth/login',
        method: 'POST',
        data,
      })
      location.href = '/'
    } catch (error) {}
  }

  const password = async (data: any) => {
    await http.request({
      url: 'auth/password',
      method: 'POST',
      data,
    })
    // location.href = '/'
  }

  return { authorize, isAdministrator, isLogin, logout, login, password }
}
