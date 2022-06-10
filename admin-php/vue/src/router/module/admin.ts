import { RouteRecordRaw } from 'vue-router'
export default {
  name: 'admin',
  path: '/admin',
  redirect: '/site',
  component: () => import('@/layouts/admin.vue'),
  meta: { auth: true },
  children: [
    {
      name: 'system.index',
      path: 'system',
      component: () => import('@/views/system/index.vue'),
    },
    {
      name: 'config.edit',
      path: 'config/edit',
      component: () => import('@/views/config/edit.vue'),
    },
    {
      name: 'user.index',
      path: 'user',
      component: () => import('@/views/user/index.vue'),
    },
    {
      name: 'user.show',
      path: 'user/:id',
      component: () => import('@/views/user/show.vue'),
    },
  ],
} as RouteRecordRaw
