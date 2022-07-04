import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/system/site/:sid/admin',
  component: () => import('@/layouts/admin.vue'),
  meta: { auth: true },
  children: [
    {
      name: 'site.admin.index',
      path: '',
      props: true,
      component: () => import('@/views/admin/index.vue'),
    },
    {
      name: 'site.admin.role',
      path: ':id/role',
      props: true,
      component: () => import('@/views/admin/role.vue'),
    },
  ],
} as RouteRecordRaw
