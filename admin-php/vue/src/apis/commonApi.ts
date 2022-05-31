import { http } from '@/plugins/axios'

export function initDataApi() {
  return http.request<Record<string, any>>({
    url: 'init',
  })
}

export interface ICaptcha {
  key: string
  img: string
  sensitive: boolean
}
export function getCaptcha() {
  return http.request<null, ICaptcha>({
    baseURL: '/captcha/api/math',
  })
}

export function ApiSendCode(account: string) {
  return http.request<null>({
    url: '/code/send',
    method: 'POST',
    data: { account },
  })
}

export function ApiSendToNotExistUser(account: string) {
  return http.request<null>({
    url: 'code/not_exist_user',
    method: 'POST',
    data: { account },
  })
}

export function ApiSendToExistUser(account: string) {
  return http.request<null>({
    url: 'code/exist_user',
    method: 'POST',
    data: { account },
  })
}
