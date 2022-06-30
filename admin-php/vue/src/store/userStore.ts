import { CacheEnum } from '../enum/CacheEnum'
import { info } from '@/apis/userApi'
import store from '@/utils/store'
import { defineStore } from 'pinia'

export default defineStore('userStore', {
  state: () => {
    return {
      info: {} as null | UserModel,
      permissions: [] as PermissionModel[],
    }
  },
  actions: {
    checkPermission(site: SiteModel, name: string) {
      return Boolean(this.permissions.find((p) => p.site_id == site.id && p.name == name))
    },
    async getUserInfo() {
      if (store.get(CacheEnum.TOKEN_NAME)) {
        this.info = await info()

        this.info.roles?.map((role: RoleModel) => {
          this.permissions = [...this.permissions, ...role.permissions]
        })
      }
    },
    resetInfo() {
      this.info = null
    },
  },
})
