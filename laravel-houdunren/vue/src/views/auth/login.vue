<script setup lang="ts">
import Captcha from '@/components/captcha.vue'
import WechatLogin from '@/components/wechatLogin.vue'
import useUtil from '@/composables/hd/useUtil'
import config from '@/config'
import { http } from '@/plugins/axios'
import { Wechat } from '@icon-park/vue-next'
import { ElMessage } from 'element-plus'
import { reactive } from 'vue'
import Footer from './components/footer.vue'
const { login } = useAuth()
const { request } = useUtil()
const form = reactive({ mobile: config.mobile, password: 'admin888', captcha: '' })

const captcha = ref()
//请自行完善逻辑
const onSubmit = request(async () => {
  if (!form.mobile || !form.password) return ElMessage.error('帐号和密码不能为空')
  captcha.value.reload()
  await http.request({ url: '/sanctum/csrf-cookie', baseURL: '' })
  login(form)
})
</script>

<template>
  <form class @submit.prevent="onSubmit">
    <div class="w-[720px] bg-gray-50 md:grid grid-cols-2 rounded-md shadow-md overflow-hidden">
      <div class="p-6 flex flex-col justify-between">
        <div>
          <h2 class="text-center text-gray-700 text-lg mt-3">用户登录</h2>
          <div class="mt-8">
            <HdFormInput v-model="form.mobile" placeholder="请输入手机号" type="password" v-clearError="'mobile'" />
            <HdError name="mobile" />
            <HdFormInput
              v-model="form.password"
              class="mt-3"
              type="password"
              placeholder="请输入登录密码"
              v-clearError="'password'" />
            <HdError name="password" />
            <Captcha class="mt-2" v-model:captcha="form.captcha" ref="captcha" />
          </div>
          <HdFormButton class="w-full mt-3 primary">登录</HdFormButton>
          <div class="flex justify-center mt-3">
            <WechatLogin />
          </div>
        </div>
        <Footer />
      </div>
      <div class="hidden md:block relative">
        <img src="/images/login.jpg" class="absolute h-full w-full object-cover" />
      </div>
    </div>
  </form>
</template>

<style lang="scss" scoped>
form {
  @apply flex justify-center items-start md:items-center p-5;
}
</style>
