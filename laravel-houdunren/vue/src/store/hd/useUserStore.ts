import { http } from '@/plugins/axios'
import useAuth from '@/composables/useAuth'
import { defineStore } from 'pinia'

export default defineStore('user', {
  state: () => {
    return {
      user: undefined as UserModel | undefined,
    }
  },
  getters: {
    isAdministrator: (state) => state.user?.id == 1,
  },
  actions: {
    setUser(data: UserModel) {
      this.user = data
    },
    async getCurrentUser() {
      const { data } = await http.request<ApiData<UserModel>>({
        url: 'user/info',
      })
      this.user = data
    },
  },
})
