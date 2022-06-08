import { getSystem } from '@/apis/system'
import { defineStore } from 'pinia'

//系统全局数据
export default defineStore('system', {
  state: () => {
    return {
      config: {} as systemModel,
    }
  },

  actions: {
    async load() {
      this.config = await getSystem()
    },
  },
})
