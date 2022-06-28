import { http } from '@/plugins/axios'

export function getModuleList(page = 1, params = {}) {
  return http.request<ModuleModel, ResponsePageResult<ModuleModel>>({
    url:
      `module?page=${page}&` +
      Object.entries(params)
        .map((item) => item.join('='))
        .join('&'),
  })
}

export function addModule(data: ModuleModel) {
  return http.request({
    url: 'module',
    method: 'POST',
    data,
  })
}

export function delModule(data: ModuleModel) {
  return http.request({
    url: `module/${data.id}`,
    method: 'DELETE',
    data,
  })
}

export function syncLocalModule() {
  return http.request({
    url: `module/sync_local_module`,
  })
}
