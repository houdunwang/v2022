<script setup lang="ts">
import { apiForgetPassword } from '@/apis/userApi'
import errorStore from '@/store/errorStore'
import utils from '@/utils'
import { loginAndRegisterCallback } from '@/utils/user'
import Footer from './footer.vue'

const form = reactive({
  account: '2300071698@qq.com',
  password: 'admin888',
  password_confirmation: 'admin888',
  code: '',
})

const onSubmit = async () => {
  const { data } = await apiForgetPassword(form)
  loginAndRegisterCallback(data)
}

const error = errorStore()
</script>

<template>
  <form class @submit.prevent="onSubmit">
    <div
      class="w-[720px] translate-y-32 md:translate-y-0 bg-white md:grid grid-cols-2 rounded-md shadow-md overflow-hidden">
      <div class="p-6 flex flex-col justify-between">
        <div>
          <h2 class="text-center text-gray-700 text-lg mt-3">密码重置</h2>
          <div class="mt-8">
            <FormInput v-model="form.account" placeholder="请输入邮箱或手机号" v-clearError="'account'" />
            <FormError name="account" />

            <FormInput v-model="form.password" class="mt-3" type="password" placeholder="请输入密码" />
            <FormError name="password" />

            <FormInput v-model="form.password_confirmation" class="mt-3" type="password" placeholder="请再次输入密码" />

            <HdCode :account="form.account" v-model:code="form.code" class="mt-2" type="exist" />

            <FormError name="captcha_code" />
          </div>

          <FormButton class="w-full primary" :disabled="error.hasError"> 确定修改</FormButton>
          <div class="flex justify-center mt-3">
            <icon-wechat
              theme="outline"
              size="24"
              fill="#fff"
              class="fab fa-weixin bg-green-600 text-white rounded-full p-1 cursor-pointer" />
          </div>
        </div>
        <Footer />
      </div>
      <div class="hidden md:block relative">
        <img src="/images/forget-password.jpg" class="absolute h-full w-full object-cover" />
      </div>
    </div>
  </form>
</template>

<style lang="scss">
form {
  @apply bg-slate-300 h-screen flex justify-center items-start md:items-center p-5;
}
</style>
