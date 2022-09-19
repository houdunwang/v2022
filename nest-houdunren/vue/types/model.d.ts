//用户模型
type UserModel = {
  id: number
  name: string
  mobile: string
  password: string
  avatar?: any
  github?: any
  wakatime?: any
  wechat?: any
  gitee?: any
  qq?: any
  createdAt: string
  updatedAt: string
}

type TopicModel = {
  id: number
  title: string
  content: string
  createdAt: string
  updatedAt: string
  userId: number
}
