import { http } from '@/plugins/axios'

export function getSiteModuleList(sid: any, page = 1) {
  return http.request<ModuleModel, ResponsePageResult<ModuleModel>>({
    url: `/site/${sid}/module?page=${page}`,
  })
}
export function addSiteModule(sid: any, id: any) {
  return http.request({
    url: `/site/${sid}/module`,
    method: 'POST',
    data: { module: id },
  })
}

export function delSiteModule(sid: any, id: any) {
  return http.request({
    url: `site/${sid}/module/${id}`,
    method: 'DELETE',
  })
}

export function setSiteDefaultModule(sid: any, id: any) {
  return http.request({
    url: `site_deault_module/site/${sid}/module/${id}`,
  })
}

export function syncSiteModulePermission(sid: any) {
  return http.request({
    url: `sync_site_module/site/${sid}`,
  })
}
