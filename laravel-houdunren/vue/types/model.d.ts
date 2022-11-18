interface UserModel {
  id: number
  name: string
  email: string
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
