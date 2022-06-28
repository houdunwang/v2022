import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/module/:sid',
  component: () => import('@/layouts/admin.vue'),
  meta: { auth: true },
  children: [
    {
      name: 'site.module.index',
      path: 'index',
      props: true,
      component: () => import('@/views/siteModule/index.vue'),
    },
  ],
} as RouteRecordRaw
