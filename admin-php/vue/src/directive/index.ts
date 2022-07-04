import useSite from '@/composables/useSite'
import errorStore from '@/store/errorStore'
import { access } from '@/utils/helper'
import { App } from 'vue'

export default function registerDirective(app: App) {
  app.directive('clearError', {
    mounted(el: HTMLElement, binding) {
      el.addEventListener('focus', () => {
        errorStore().clearError(binding.value)
      })
    },
  })

  app.directive('access', {
    async mounted(el: HTMLElement, binding) {
      const site = binding.value ?? (await useSite()).site
      const name = binding.arg as string

      const state = access(name, site)

      if (!state) el.style.display = 'none'
    },
  })
}
