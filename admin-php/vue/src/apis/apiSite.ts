import { IUser } from './types/user'
import { http } from '@/plugins/axios'
export interface ISite {
    title: string
    address: string
    email: string
    url: string
    user_id: number
    updated_at: string
    created_at: string
    id: number
    user: IUser
}
export function apiSiteAdd(data: any) {
    return http.request<ISite>({
        url: 'site',
        method: 'POST',
        data,
    })
}

export function apiSiteUpdate(data: ISite) {
    return http.request<ISite>({
        url: `site/${data.id}`,
        method: 'PUT',
        data,
    })
}

export function apiGetSiteGet() {
    return http.request<ISite, ResponsePageResult<ISite>>({
        url: 'site',
    })
}

export function apiSiteFind(id: number) {
    return http.request<ISite>({
        url: `site/${id}`,
    })
}

export function apiSiteDelete(id: number) {
    return http.request({
        url: `site/${id}`,
        method: 'DELETE',
    })
}
