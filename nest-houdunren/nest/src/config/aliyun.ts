import { registerAs } from '@nestjs/config'

export const aliyun = registerAs('aliyun', () => {
  return {
    access_key: process.env.ALIYUN_ACCESS_KEY || '',
    access_secret: process.env.ALIYUN_ACCESS_SECRET || '',
    sms_sign: '后盾人',
    sms_code_template: 'SMS_12840367',
  }
})
