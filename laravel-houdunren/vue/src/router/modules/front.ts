import indexVue from '@/layouts/front/index.vue'
import homeVue from '@/views/home.vue'
import { RouteRecordRaw } from 'vue-router'
export default {
  path: '/',
  component: indexVue,
  children: [
    {
      name: 'home',
      path: '/',
      component: homeVue,
    },
    //系统课程
    {
      name: 'system.index',
      path: 'system',
      component: () => import('@/views/system/index.vue'),
    },
    {
      name: 'system.show',
      path: 'system/:id',
      component: () => import('@/views/system/show.vue'),
    },

    //课程
    {
      name: 'lesson.index',
      path: 'lesson',
      component: () => import('@/views/lesson/index.vue'),
    },
    {
      name: 'lesson.show',
      path: 'lesson/:id',
      component: () => import('@/views/lesson/show.vue'),
    },
    //视频
    {
      name: 'video.index',
      path: 'video',
      component: () => import('@/views/video/index.vue'),
    },
    {
      name: 'video.show',
      path: 'video/:id',
      component: () => import('@/views/video/show.vue'),
    },
    //贴子
    {
      name: 'topic.index',
      path: 'topic',
      component: () => import('@/views/topic/index.vue'),
    },
    {
      name: 'topic.create',
      path: 'topic/create',
      component: () => import('@/views/topic/create.vue'),
    },
    {
      name: 'topic.edit',
      path: 'topic/edit/:id',
      component: () => import('@/views/topic/edit.vue'),
    },
    {
      name: 'topic.show',
      path: 'topic/:id',
      component: () => import('@/views/topic/show.vue'),
    },
    {
      path: 'subscribe',
      name: 'subscribe',
      component: () => import('@/views/subscribe/front.vue'),
      meta: { title: '订阅会员', auth: true },
    },
  ],
} as RouteRecordRaw
