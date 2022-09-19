import { defineStore } from 'pinia'

export default defineStore('errorStore', {
  state: () => {
    return {
      errors: {} as Record<string, any>,
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
    resetError() {
      this.errors = {}
    },
    setErrors(errors: Record<string, string[]>[]) {
      errors.forEach((error: any) => {
        this.errors[error.field] = error.message
      })
    },
    clearError(name: string) {
      if (this.errors[name]) {
        delete this.errors[name]
      }
    },
  },
})
