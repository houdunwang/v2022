import useUtil from './composables/system/useUtil'
import userStore from './store/userStore'

export const can = (model: { userId: number; [key: string]: any }) => {
  const { user } = userStore()
  const { isLogin } = useUtil()

  return (isLogin() && model.userId == user?.id) || user?.id == 1
}
