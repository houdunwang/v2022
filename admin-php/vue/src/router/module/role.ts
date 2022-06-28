import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/role/:sid',
  component: () => import('@/layouts/admin.vue'),
  meta: { auth: true },
  children: [
    {
      name: 'role.index',
      path: 'index',
      props: true,
      component: () => import('@/views/role/index.vue'),
    },
    {
      name: 'role.add',
      path: 'add',
      props: true,
      component: () => import('@/views/role/add.vue'),
    },
    {
      name: 'role.edit',
      path: ':id/edit',
      props: true,
      component: () => import('@/views/role/edit.vue'),
    },
    {
      name: 'role.permission',
      path: ':rid/permission',
      props: true,
      component: () => import('@/views/role/permission.vue'),
    },
  ],
} as RouteRecordRaw
