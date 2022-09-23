import { registerAs } from '@nestjs/config'
export const app = registerAs('app', () => ({
  name: process.env.APP_NAME || '后盾人-向军大叔',
  token_access: process.env.TOKEN_SECRET || '',
  mobile: process.env.MOBILE || '',
  is_dev: process.env.NODE_ENV == 'development',

  //课程每页显示数量
  lesson_page_row: 9,
  topic_page_row: 10,
  video_page_row: 10,
}))
