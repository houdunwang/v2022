import { http } from '@/plugins/axios'

export function apiSiteAdd(data: any) {
  return http.request<SiteModel>({
    url: 'site',
    method: 'POST',
    data,
  })
}

export function apiSiteUpdate(data: SiteModel) {
  return http.request<SiteModel>({
    url: `site/${data.id}`,
    method: 'PUT',
    data,
  })
}

export function apiGetSiteGet() {
  return http.request<SiteModel, ResponsePageResult<SiteModel>>({
    url: 'site',
  })
}

export function apiSiteFind(id: string | string[]) {
  return http
    .request<SiteModel>({
      url: `site/${id}`,
    })
    .then((r) => r.data)
}

export function apiSiteDelete(id: number) {
  return http.request({
    url: `site/${id}`,
    method: 'DELETE',
  })
}

export function syncAllSiteData(id: number) {
  return http.request({
    url: `site/sync_local_module`,
  })
}
