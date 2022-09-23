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
    {
      path: 'topic/add',
      name: 'topic.add',
      component: () => import('@/views/topic/add.vue'),
    },
    {
      path: 'topic/edit/:id',
      name: 'topic.edit',
      component: () => import('@/views/topic/edit.vue'),
    },
    {
      path: 'topic/:id',
      name: 'topic.show',
      component: () => import('@/views/topic/show.vue'),
    },
    {
      path: 'system',
      name: 'system.index',
      component: () => import('@/views/system/index.vue'),
    },
    {
      path: 'system/:id',
      name: 'system.show',
      component: () => import('@/views/system/show.vue'),
    },
    {
      path: 'lesson',
      name: 'lesson.index',
      component: () => import('@/views/lesson/index.vue'),
    },
    {
      path: 'lesson/:id',
      name: 'lesson.show',
      component: () => import('@/views/lesson/show.vue'),
    },
    {
      path: 'video/:id',
      name: 'video.show',
      component: () => import('@/views/video/show.vue'),
    },
  ],
} as RouteRecordRaw
