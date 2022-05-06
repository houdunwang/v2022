import errorStore from '@/store/errorStore'
import { App } from 'vue'

export default function registerDirective(app: App) {
  app.directive('clearError', {
    mounted(el: HTMLElement, binding) {
      el.addEventListener('focus', () => {
        errorStore().clearError(binding.value)
      })
    },
  })
}
