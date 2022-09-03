//用户模型
type UserModel = {
  id?: string | number
  mobile?: string | number
  sex?: number
  email?: string
  nickname?: any
  home?: any
  weibo?: any
  wechat?: any
  github?: any
  qq?: any
  avatar?: string
  created_at?: string
  updated_at?: string
}

interface CategoryModel {
  id: number
  title: string
}

interface ArticleModel {
  id: number
  title: string
  content: string
  categoryId: number
  createdAt: string
  updatedAt: string
  category: {
    id: number
    title: string
  }
}
