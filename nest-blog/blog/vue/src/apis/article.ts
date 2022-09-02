import { http } from '@/plugins/axios'

export function getArticleList(page = 1, args = {}) {
  const url =
    `article?page=${page}&` +
    Object.entries(args)
      .map(([key, value]) => key + '=' + value)
      .join('&')

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
