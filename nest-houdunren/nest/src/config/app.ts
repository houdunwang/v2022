import { registerAs } from '@nestjs/config'
export const app = registerAs('app', () => ({
  name: process.env.APP_NAME || '后盾人-向军大叔',
  mobile: process.env.MOBILE || '',
  is_dev: process.env.NODE_ENV == 'development',
}))
