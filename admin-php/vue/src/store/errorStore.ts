import { defineStore } from 'pinia'

export default defineStore('errorStore', {
  state: () => {
    return {
      errors: {} as Record<string, string>,
    }
  },
  getters: {
    getError(state) {
      return (name: string) => {
        return state.errors[name]
      }
    },
    hasError(state) {
      return Object.keys(state.errors).length > 0
    },
  },
  actions: {
    resetErrors() {
      this.errors = {}
    },
    setErrors(errors: Record<string, string[]>) {
      Object.entries(errors).forEach(([key, value]) => {
        this.errors[key] = value[0]
      })
    },
    clearError(name: string) {
      if (this.errors[name]) delete this.errors[name]
    },
  },
})
