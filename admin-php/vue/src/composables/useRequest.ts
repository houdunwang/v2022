// import { apiSiteDelete, apiUpdateSite, ISite } from './../apis/apiSite'
// import { apiGetSiteList, apiAddSite, apiGetSitInfo } from '@/apis/apiSite'
import _ from 'lodash'

interface IField {
    title: string
    name: string
    form?: string
}

export default <T extends Record<string, any>>(fields: IField[] = []) => {
    //集合
    const collection = ref<T[]>()

    //单条模型
    const model = ref<T>(
        _.zipObject(
            fields.map((f) => f.name),
            fields.map(() => ''),
        ) as unknown as T,
    )

    //加载列表或单个站点数据
    const load = async (api: () => Promise<ResponsePageResult<T>>) => {
        const { data } = await api()
        collection.value = data
    }

    const find = async (api: (id: number) => Promise<ResponseResult<T>>, id: number) => {
        const { data } = await api(id)
        model.value = data
    }

    const post = async (api: (data: T) => Promise<ResponseResult<T>>) => {
        const { data } = await api(model.value)
        model.value = data
    }

    const del = async (api: (id: number) => Promise<any>, id: number) => {
        await api(id)
    }

    return { load, find, post, collection, model, del }
}
