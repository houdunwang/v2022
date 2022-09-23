import { Random } from 'mockjs'

export const user = {
  id: Random.integer(1, 1000),
  name: Random.cname(),
  password: 'admin888',
  mobile: Random.integer(10000) as unknown as string,
  avatar: '/images/xj.jpg',
  nickname: '向军大叔',
  sex: Random.range(1, 2, 1)[0],
  email: Random.email(),
  real_name: null,
  home: 'https://www.houdunren.com',
  weibo: null,
  wechat: null,
  github: null,
  qq: null,
  wakatime: null,
  createdAt: new Date().toString(),
  updatedAt: new Date().toString(),
} as UserModel
