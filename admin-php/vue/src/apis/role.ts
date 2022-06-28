import { http } from '@/plugins/axios'

export function getRoleList(sid: any) {
  return http.request<RoleModel, ResponsePageResult<RoleModel>>({
    url: `site/${sid}/role`,
  })
}

export function roleFind(sid: any, id: number) {
  return http
    .request<RoleModel>({
      url: `site/${sid}/role/${id}`,
    })
    .then((r) => r.data)
}
export function addRole(sid: any, role: RoleModel) {
  return http.request({
    url: `site/${sid}/role`,
    method: 'POST',
    data: role,
  })
}

export function updateRole(sid: any, role: RoleModel) {
  return http.request({
    url: `site/${sid}/role/${role.id}`,
    method: 'PUT',
    data: role,
  })
}

export function delRole(sid: any, id: number) {
  return http.request({
    url: `site/${sid}/role/${id}`,
    method: 'DELETE',
  })
}

export function setRolePermission(sid: any, rid: number, permissions: string[]) {
  return http.request({
    url: `site/${sid}/role/${rid}/permission`,
    method: 'PUT',
    data: { permissions },
  })
}
