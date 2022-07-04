import { RouteRecordRaw } from 'vue-router'
export default {
  name: 'site',
  path: '/system/site',
  component: () => import('@/layouts/admin.vue'),
  meta: { auth: true },
  children: [
    {
      name: 'site.index',
      path: '',
      component: () => import('@/views/site/index.vue'),
    },
    {
      name: 'site.add',
      path: 'add',
      component: () => import('@/views/site/add.vue'),
    },
    {
      name: 'site.edit',
      path: ':id',
      component: () => import('@/views/site/edit.vue'),
    },
    {
      name: 'site.config',
      path: 'config/:id',
      component: () => import('@/views/site/config.vue'),
    },
  ],
} as RouteRecordRaw
