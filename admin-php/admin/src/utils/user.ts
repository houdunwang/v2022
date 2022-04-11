import { ILoginData } from './../apis/userApi'
import userApi from '@/apis/userApi'
import { CacheEnum } from '@/enum/cacheEnum'
import store from './store'
import router from '@/router'
import userStroe from '@/store/userStroe'

export async function login(values: ILoginData) {
    const { data: { token, user }, } = await userApi.login(values)

    store.set(CacheEnum.TOKEN_NAME, token)
    const routeName = store.get(CacheEnum.REDIRECT_ROUTE_NAME) ?? 'home'
    router.push({ name: routeName })
}

export async function logout() {
    await userApi.logout();
    store.remove(CacheEnum.TOKEN_NAME)
    router.push('/')
    userStroe().info = null
}
