import { http } from '@/plugins/axios'
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
  return http.request<null, ICaptcha>({
    url: '/code/send',
    method: 'POST',
    data: { account },
  })
}
