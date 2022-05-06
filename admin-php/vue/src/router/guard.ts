import errorStore from '@/store/errorStore'
import { CacheEnum } from '../enum/CacheEnum'
import util from '@/utils'
import { RouteLocationNormalized, Router } from 'vue-router'
import store from '@/utils/store'

class Guard {
  constructor(private router: Router) {}

  public run() {
    this.router.beforeEach(this.beforeEach.bind(this))
  }

  private async beforeEach(to: RouteLocationNormalized, from: RouteLocationNormalized) {
    errorStore().resetErrors()

    if (to.meta.auth && !this.token()) {
      store.set(CacheEnum.REDIRECT_ROUTE_NAME, to.name)
      return { name: 'login' }
    }
    if (to.meta.guest && this.token()) return from
  }

  private token(): string | null {
    return util.store.get(CacheEnum.TOKEN_NAME)
  }
}

export default (router: Router) => {
  new Guard(router).run()
}
