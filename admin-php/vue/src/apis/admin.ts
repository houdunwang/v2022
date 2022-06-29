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
//获取管理员
export function adminFind(site: number, id: number) {
  return http
    .request<UserModel>({
      url: `site/${site}/admin/${id}`,
    })
    .then((r) => r.data)
}

//设置管理员角色
export function setAdminRole(sid: number, uid: number, roles: number[]) {
  return http.request({
    url: `site/${sid}/admin/${uid}/role`,
    method: 'PUT',
    data: { roles },
  })
}
