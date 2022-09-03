import { http } from '@/plugins/axios'

export function getArticleList(page = 1, cid?: any) {
  const url = `article?page=${page}&` + (cid ? `category=${cid}` : '')

  return http.request<ArticleModel, ResponsePageResult<ArticleModel>>({
    url,
  })
}

export async function getArticle(id: number) {
  const r = await http.request<ArticleModel>({
    url: `article/${id}`,
  })
  return r.data
}

export async function addArticle(data: any) {
  return http.request({
    url: 'article',
    method: 'POST',
    data,
  })
}

export async function updateArticle(data: any) {
  return http.request({
    url: `article/${data.id}`,
    method: 'PATCH',
    data,
  })
}
