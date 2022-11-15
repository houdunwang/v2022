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
      name: 'lesson.show',
      path: 'lesson/:id',
      component: () => import('@/views/lesson/show.vue'),
    },
    //视频
    {
      name: 'video.show',
      path: 'video/:id',
      component: () => import('@/views/video/show.vue'),
    },
  ],
} as RouteRecordRaw
