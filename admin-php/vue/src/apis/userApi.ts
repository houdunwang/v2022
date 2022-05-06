import { ILogin, ILoginForm, IRegisterResponse, IUser } from './types/user'
import { http } from '@/plugins/axios'

function info() {
  return http.request<IUser>({
    url: `user/info`,
  })
}

export function login(data: ILoginForm) {
  return http.request<ILogin>({
    url: `login`,
    method: 'post',
    data,
  })
}

export interface IRegisterForm {
  account: string
  password: string
  password_confirmation: string
  code: string
}
export function apiRegister(data: ILoginForm) {
  return http.request<IRegisterResponse>({
    url: `register`,
    method: 'post',
    data,
  })
}

export default { info, login }
