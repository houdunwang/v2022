import { App } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import autoload from './autoload'
import guard from './guard'

const router = createRouter({
  history: createWebHistory(),
  routes: [],
})

export async function setupRouter(app: App) {
  autoload(router)
  guard(router)
  app.use(router)
}

export default router
