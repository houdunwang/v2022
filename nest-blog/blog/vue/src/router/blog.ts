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
    {
      name: 'article.create',
      path: 'article',
      component: () => import('@/views/article/create.vue'),
    },
    {
      name: 'article.update',
      path: 'article/update/:id',
      component: () => import('@/views/article/update.vue'),
    },
    {
      name: 'category.index',
      path: 'category/:cid',
      component: () => import('@/views/category/index.vue'),
    },
  ],
} as RouteRecordRaw
