interface UserModel {
  id: number
  name: string
  sex: number
  email: string
  real_name?: any
  home?: any
  weibo?: any
  wechat?: any
  github?: any
  qq?: any
  wakatime?: any
  email_verified_at: string
  mobile_verified_at?: any
  created_at: string
  updated_at: string
  lock?: any
  credit1?: any
  credit2?: any
  credit3?: any
  credit4?: any
  credit5?: any
  credit6?: any
  favour_count: number
  favorite_count: number
  avatar: string
  permissions: string[]
  is_super_admin: boolean
  roles?: RoleModel[]
}

interface systemModel {
  id: number
  config: {
    code: {
      expire: string
      length: number
      timeout: number
    }
    site: {
      logo: string
      title: string
      copyright: string
    }
    aliyun: {
      access_key_id: string
      sms_sign_name: string
      access_key_secret: string
    }
    avatar: {
      avatar_crop_width: string
      avatar_crop_height: string
    }
  }
  created_at: string
  updated_at: string
}

interface SiteModel {
  id: number
  title: string
  url: string
  created_at: string
  user_id: number
  config: {
    aliyun: {
      access_key_id: string
      sms_sign_name: string
      access_key_secret: string
    }
    site: {
      email: string
      address: string
      copyright: string
    }
  }
  user: UserModel
  module?: ModuleModel
}

interface ModuleModel {
  id?: number
  title: string
  version: string
  name: string
  author: string
  preview?: string
  permissions: { title: string; items: { title: string; name: string }[] }[]
}

interface PermissionModel {
  id: number
  title: string
  name: string
  site_id: number
}

interface RoleModel {
  id: number
  created_at: string
  guard_name: string
  name: string
  site_id: number
  title: string
  updated_at: string
  permissions: PermissionModel[]
}
