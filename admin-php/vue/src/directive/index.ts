import errorStore from '@/store/errorStore'
import { App } from 'vue'

export default function registerDirective(app: App) {
  app.directive('clearError', {
    mounted(el: HTMLElement, binding) {
      el.addEventListener('focus', () => {
        const store = errorStore()
        store.clearError(binding.value)
      })
    },
  })
}
