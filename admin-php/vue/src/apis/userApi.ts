import { http } from '@/plugins/axios'
export function getUserList() {
  return http.request<UserModel[], ResponsePageResult<UserModel>>({
    url: 'user',
  })
}

export function info() {
  return http.request<UserModel>({
    url: `user/info`,
  })
}

export function login(data: { account: string; password: string }) {
  return http.request<{
    user: UserModel
    token: string
  }>({
    url: `login`,
    method: 'post',
    data,
  })
}

interface IRegisterForm {
  account: string
  password: string
  password_confirmation: string
  code: string
}

export function apiRegister(data: IRegisterForm) {
  return http.request<{
    user: UserModel
    token: string
  }>({
    url: `register`,
    method: 'post',
    data,
  })
}

export function apiForgetPassword(data: IRegisterForm) {
  return http.request<{
    user: UserModel
    token: string
  }>({
    url: `account/forget-password`,
    method: 'post',
    data,
  })
}

export default { info, login }
