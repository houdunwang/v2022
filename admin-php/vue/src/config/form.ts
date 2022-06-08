export type fieldType = {
  title: string
  name: string
  error_name?: string | undefined
  type?: 'input' | 'textarea' | 'radio' | 'image' | undefined
  placeholder?: string | undefined
  disabled?: boolean
}

export const systemField = {
  site: [
    { title: '网站名称', name: 'title', error_name: 'config.site.title' },
    { title: '版权信息', name: 'copyright', error_name: 'config.site.copyright' },
    { title: '网站标志', name: 'logo', type: 'image', error_name: 'config.site.logo' },
  ],
  code: [
    { title: '有效期', name: 'expire', error_name: 'config.code.expire', placeholder: '验证码有效期，单位为秒' },
    { title: '间隔时间', name: 'timeout', error_name: 'config.code.timeout' },
    { title: '数量', name: 'length', error_name: 'config.code.length' },
  ],
  aliyun: [
    { title: 'key', name: 'access_key_id', error_name: 'config.aliyun.access_key_id' },
    { title: 'secret', name: 'access_key_secret', error_name: 'config.aliyun.access_key_secret' },
    { title: '短信签名', name: 'sms_sign_name', error_name: 'config.aliyun.sms_sign_name' },
  ],
  avatar: [
    { title: '宽度', name: 'avatar_crop_width', error_name: 'config.avatar.avatar_crop_width' },
    { title: '高度', name: 'avatar_crop_height', error_name: 'config.avatar.avatar_crop_height' },
  ],
} as Record<string, fieldType[]>

//站点
export const siteField = {
  base: [
    { title: '站点名称', name: 'title' },
    { title: '网址', name: 'url' },
  ],
  site: [
    { title: '地址', name: 'address' },
    { title: '邮箱', name: 'email' },
  ],
  aliyun: [
    { title: 'key', name: 'access_key_id', error_name: 'config.aliyun.access_key_id' },
    { title: 'secret', name: 'access_key_secret', error_name: 'config.aliyun.access_key_secret' },
    { title: '短信签名', name: 'sms_sign_name', error_name: 'config.aliyun.sms_sign_name' },
  ],
} as Record<string, fieldType[]>

export const UserField = [
  { title: '昵称', name: 'name', disabled: true },
  { title: '头像', name: 'avatar', type: 'image', disabled: true },
  { title: '注册时间', name: 'created_at', disabled: true },
  { title: '更新时间', name: 'updated_at', disabled: true },
] as fieldType[]
