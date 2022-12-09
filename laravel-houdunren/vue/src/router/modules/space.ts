import { RouteRecordRaw } from 'vue-router'

export default {
  path: '/space/:uid',
  component: () => import('@/layouts/space/index.vue'),
  children: [
    {
      path: '',
      name: 'space',
      component: () => import('@/views/space/learnHistory.vue'),
    },
    {
      path: 'topic',
      name: 'space.topic',
      component: () => import('@/views/space/topic.vue'),
    },
  ],
} as RouteRecordRaw
