import { getArticle, getArticleList } from '@/apis/article'
const pageResult = ref<ResponsePageResult<ArticleModel>>()
let params = {}

export default () => {
  const article = ref<ArticleModel>()
  const all = async (page = 1, args?: Record<string, any>) => {
    if (args) params = args
    pageResult.value = await getArticleList(page, params)
  }

  const find = async (id: number) => {
    article.value = await getArticle(id)
  }

  return { all, pageResult, article, find }
}
