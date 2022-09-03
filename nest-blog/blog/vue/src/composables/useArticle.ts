import { addArticle, getArticle, getArticleList, updateArticle } from '@/apis/article'

export default () => {
  const pageResult = ref<ResponsePageResult<ArticleModel>>()
  let categoryId: any = null
  const article = ref<ArticleModel>()
  const all = async (page = 1, cid?: any) => {
    if (cid) categoryId = cid
    pageResult.value = await getArticleList(page, categoryId)
  }

  const find = async (id: number) => {
    article.value = await getArticle(id)
  }
  const add = async (data: Record<string, any>) => {
    return addArticle(data)
  }

  const update = async (data: ArticleModel) => {
    console.log(data)
    return updateArticle(data)
  }

  return { all, pageResult, article, find, add, update }
}
