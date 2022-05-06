export interface IUser {
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
}

export interface ILogin {
  user: IUser
  token: string
}

export interface IRegisterResponse {
  user: IUser
  token: string
}

export interface ILoginForm {
  account: string
  password: string
}
