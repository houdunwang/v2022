import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/site/:sid/admin',
  component: () => import('@/layouts/admin.vue'),
  meta: { auth: true },
  children: [
    {
      name: 'site.admin.index',
      path: '',
      props: true,
      component: () => import('@/views/admin/index.vue'),
    },
  ],
} as RouteRecordRaw
