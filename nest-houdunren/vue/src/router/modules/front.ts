import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/',
  component: () => import('@/layouts/front.vue'),
  children: [
    {
      path: '',
      name: 'topic.index',
      component: () => import('@/views/topic/index.vue'),
    },
  ],
} as RouteRecordRaw
