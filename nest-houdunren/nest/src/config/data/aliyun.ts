import { registerAs } from '@nestjs/config'

export const aliyuConfig = registerAs('aliyun', () => {
  return {
    access_key: 'LTAI5t7Kktrp8sccQbYsQ92a',
    access_secret: 'YP41PPTzD55frnwZFn17G8vmIOZdHm',
    sms_sign: '后盾人',
    sms_code_template: 'SMS_12840367',
  }
})
