import { http } from '@/plugins/axios'
export function getUserList(page = 1, params = {}) {
  return http.request<UserModel[], ResponsePageResult<UserModel>>({
    url:
      `user?page=${page}&` +
      Object.entries(params)
        .map((e) => e.join('='))
        .join('&'),
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

export function findUser(id: string | string[]) {
  return http
    .request<UserModel>({
      url: `user/${id}`,
    })
    .then((r) => r.data)
}

// export default { info, login }
