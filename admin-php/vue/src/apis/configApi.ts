import { http } from '@/plugins/axios'
export function getConfig() {
  return http.request<Record<string, any>>({
    url: `config/system`,
  })
}

export function updateConfig(data: any) {
  return http.request<any>({
    url: `config/system`,
    method: 'PUT',
    data,
  })
}
