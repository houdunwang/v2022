import { http } from '@/plugins/axios'
export function getSystem() {
  return http
    .request<systemModel>({
      url: `system`,
    })
    .then((r) => r.data)
}

export function updateSystem(data: any) {
  return http.request<any>({
    url: `system`,
    method: 'PUT',
    data,
  })
}
