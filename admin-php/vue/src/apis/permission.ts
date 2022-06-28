import { http } from '@/plugins/axios'

export function getSitePermissionTable(sid: any) {
  return http
    .request<ModuleModel[]>({
      url: `site/${sid}/permission`,
    })
    .then((r) => r.data)
}
