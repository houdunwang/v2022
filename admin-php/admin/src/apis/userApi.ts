import { http } from '@/plugins/axios'

export interface User {
    name: string
    age: number
    avatar: string
    permissions: string[]
}

function info() {
    return http.request<IUser>({
        url: `user/info`,
    })
}

interface LoginInterface {
    token: string,
    user: IUser
}

export interface ILoginData {
    account: string
    password: string
}

export function login(data: ILoginData) {
    return http.request<LoginInterface>({
        url: `login`,
        method: 'post',
        data,
    })
}

export function logout() {
    return http.request({
        url: `logout`,
        method: 'get',
    })
}

export default { info, login, logout }
