import { Router, RouteRecordRaw } from 'vue-router'
import userStore from '@/store/userStore'

function autoloadModuleRoutes() {
  const modules = import.meta.globEager('../module/**/*.ts')
  const routes = [] as RouteRecordRaw[]
  Object.keys(modules).forEach((key) => {
    routes.push(modules[key].default)
  })

  return routes
}

function autoload(router: Router) {
  const user = userStore()
  let routes: RouteRecordRaw[] = autoloadModuleRoutes()

  routes = routes.map((route: any) => {
    route.children = route.children?.filter((r: any) => {
      const permission = r.meta?.permission
      return permission ? user.info?.permissions?.includes(permission) : true
    })
    return route
  })

  routes.forEach((r) => router.addRoute(r))
}

export default autoload
