import { http } from '@/plugins/axios'

type ResponseData = {
  token: string
}

export function login(data: any) {
  return http.request<ResponseData>({
    url: `login`,
    method: 'post',
    data,
  })
}

export function register(data: { mobile: string; password: string; password_confirmation: string }) {
  return http.request<ResponseData>({
    url: `register`,
    method: 'post',
    data,
  })
}

export function forgetPassword(data: { mobile: string; password: string; password_confirmation: string }) {
  return http.request<ResponseData>({
    url: 'forget-password',
    method: 'post',
    data,
  })
}
