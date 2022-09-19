import { CacheKey } from './../enum/CacheKey'
import { currentUserInfo } from '@/apis/user'
import storage from '@/utils/storage'
import { defineStore } from 'pinia'
import { ref } from 'vue'

export default defineStore('userStore', () => {
  const user = ref<UserModel>()

  const getUser = async () => {
    if (storage.get(CacheKey.TOKEN_NAME)) user.value = await currentUserInfo()
  }

  return { user, getUser }
})
