//用户模型
type UserModel = {
  id: number
  mobile: string
  name: string
  password: string
  avatar: string
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

type SystemModel = {
  id: number
  title: string
  description: string
  preview: string
  createdAt: string
  updatedAt: string
}

type LessonModel = {
  id: number
  title: string
  price: string
  description: string
  preview: string
  download?: any
  click: number
  status: boolean
  videoNum?: any
  createdAt: string
  updatedAt: string
  systemId: number
  videos: any[]
}

type VideoModel = {
  id: number
  title: string
  path: string
  lessonId: number
}

type CommentModel = {
  id: number
  content: string
  createdAt: string
  updatedAt: string
  userId: number
  topicId: number
  videoId?: any
  User: UserModel
}
