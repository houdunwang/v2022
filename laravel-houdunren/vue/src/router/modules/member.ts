import { RouteRecordRaw } from 'vue-router'

export default {
  path: '/member',
  component: () => import('@/layouts/member/index.vue'),
  children: [
    {
      path: '',
      name: 'member',
      component: () => import('@/views/member/info.vue'),
    },
    {
      path: 'mobile',
      name: 'member.mobile',
      component: () => import('@/views/member/mobile.vue'),
    },
    {
      path: 'avatar',
      name: 'member.avatar',
      component: () => import('@/views/member/avatar.vue'),
    },
  ],
} as RouteRecordRaw
