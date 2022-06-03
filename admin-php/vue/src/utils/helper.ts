import { CacheEnum } from '@/enum/CacheEnum'
import router from '@/router'
import userStore from '@/store/userStore'
import store from './store'
const storeUser = userStore()

//超级管理员
export function isSuperAdmin() {
  return Boolean(storeUser.info?.is_super_admin)
}

//登录检测
export function isLogin(): boolean {
  return !!store.get(CacheEnum.TOKEN_NAME)
}

//登录注册回调
export function loginAndRegisterCallback(data: { token: string; [x: string]: any }) {
  store.set(CacheEnum.TOKEN_NAME, data.token)

  userStore().getUserInfo()

  const routeName = store.get(CacheEnum.REDIRECT_ROUTE_NAME) ?? 'home'

  router.push({ name: routeName })
}

//退出登录
export async function logout() {
  userStore().resetInfo()

  store.remove(CacheEnum.TOKEN_NAME)
  router.push({ name: 'home' })
}
