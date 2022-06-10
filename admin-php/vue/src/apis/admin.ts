import { http } from '@/plugins/axios'

//管理员列表
export function getAdminList(page = 1, site: number, params = {}) {
  return http.request<UserModel, ResponsePageResult<UserModel>>({
    url:
      `site/${site}/admin?page=${page}&` +
      Object.entries(params)
        .map((item) => item.join('='))
        .join('&'),
  })
}

//同步管理
export function syncAdmin(site: number, user_id: number) {
  return http.request({
    url: `site/${site}/admin `,
    method: 'POST',
    data: { user: user_id },
  })
}

//删除管理员
export function removeAdmin(site: number, user_id: number) {
  return http.request({
    url: `site/${site}/admin/${user_id}`,
    method: 'DELETE',
  })
}
