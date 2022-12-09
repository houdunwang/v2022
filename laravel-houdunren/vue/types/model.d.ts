interface UserModel {
  id: number
  name: string
  email: string
  avatar: string
  qq?: any
  github?: any
  wakatime?: any
  douyin?: any
  wechat?: any
  weibo?: any
  email_verified_at: string
  created_at: string
  updated_at: string
}

interface SystemModel {
  id: number
  title: string
  description: string
  preview: string
  lesson_count: number
  video_count: number
  order: number
  created_at: string
  updated_at: string
  lessons: LessonModel[]
}

interface LessonModel {
  id?: number
  title: string
  preview: string
  description: string
  download?: any
  system_id: any
  created_at?: string
  updated_at?: string
  videos: VideoModel[]
  system?: SystemModel
}
interface VideoModel {
  id?: number
  title: string
  lesson_id?: number
  created_at?: string
  updated_at?: string
  path: string
  lesson?: LessonModel
}

interface TopicModel {
  id: number
  title: string
  content: string
  html: string
  user_id: number
  created_at: string
  updated_at: string
  user: UserModel
}

interface CommentModel {
  id: number
  user_id: number
  content: string
  commentable_type: string
  commentable_id: number
  html: string
  comment_id?: any
  reply_user_id?: any
  created_at: string
  updated_at: string
  user: UserModel
  reply_user?: UserModel
  replys: CommentModel[]
  comment?: any
}

interface ActivityModel {
  id: number
  log_name: string
  description: string
  subject_type: string
  event?: any
  subject_id: number
  causer_type: string
  causer_id: number
  properties: { id: number; type: string; model: { id: number; type: string } }
  batch_uuid?: any
  created_at: string
  updated_at: string
  title: string
  user: UserModel
}

interface LearnHistoryModel {
  id: number
  user_id: number
  video_id: number
  lesson_id: number
  created_at: string
  updated_at: string
  user: UserModel
  video: VideoModel
}
