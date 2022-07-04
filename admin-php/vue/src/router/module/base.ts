import { RouteRecordRaw } from 'vue-router'
export default {
  name: 'base',
  path: '/base',
  component: () => import('@/layouts/auth.vue'),
  children: [
    {
      path: '/',
      name: 'home',
      component: () => import('@/views/home.vue'),
    },

    {
      path: '/:any(.*)',
      name: 'notFound',
      component: () => import('@/views/errors/404.vue'),
    },
  ],
} as RouteRecordRaw
