import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/',
  component: () => import('@/layouts/front.vue'),
  children: [
    {
      name: 'article.index',
      path: '',
      component: () => import('@/views/article/index.vue'),
    },
    {
      name: 'article.show',
      path: 'article/:id',
      component: () => import('@/views/article/show.vue'),
    },
  ],
} as RouteRecordRaw
