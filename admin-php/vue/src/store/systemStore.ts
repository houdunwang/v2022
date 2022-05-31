import { initDataApi } from '@/apis/commonApi'
import { defineStore } from 'pinia'

//系统全局数据
export default defineStore('system', {
  state: () => {
    return {
      config: {} as { [key: string]: any; title: string; logo: string; copyright: string },
    }
  },

  actions: {
    async load() {
      const { data } = await initDataApi()
      this.config = data.config as any
    },
  },
})
