import { RouteRecordRaw } from 'vue-router'
export default {
  name: 'auth',
  path: '/auth',
  component: () => import('@/layouts/auth.vue'),
  meta: { guest: true },
  children: [
    {
      path: '/login',
      name: 'login',
      component: () => import('@/views/auth/login.vue'),
      meta: { guest: true },
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('@/views/auth/register.vue'),
      meta: { guest: true },
    },
    {
      path: '/forget-password',
      name: 'forgetPassword',
      component: () => import('@/views/auth/forgetPassword.vue'),
      meta: { guest: true },
    },
  ],
} as RouteRecordRaw
