import userStore from '@/store/userStore'
const storeUser = userStore()

export function is_super_admin() {
  return Boolean(storeUser.info?.is_super_admin)
}
