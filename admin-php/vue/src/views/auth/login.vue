<script setup lang="ts">
import useCaptcha from '@/composables/useCaptcha'
import errorStore from '@/store/errorStore'
import utils from '@/utils'
import Footer from './footer.vue'

const form = reactive({ account: '', password: 'admin888', captcha_code: '', captcha_key: '' })

const onSubmit = async () => {
  useCaptcha().loadCaptcha()
  utils.user.login(form)
}
const error = errorStore()
</script>

<template>
  <form class @submit.prevent="onSubmit">
    <div
      class="w-[720px] translate-y-32 md:translate-y-0 bg-white md:grid grid-cols-2 rounded-md shadow-md overflow-hidden">
      <div class="p-6 flex flex-col justify-between">
        <div>
          <h2 class="text-center text-gray-700 text-lg mt-3">会员登录</h2>
          <div class="mt-8">
            <FormInput v-model="form.account" v-clearError="'account'" placeholder="请输入邮箱或手机号" />
            <FormError name="account" />

            <FormInput v-model="form.password" class="mt-3" type="password" placeholder="请输入密码" />
            <FormError name="password" />

            <HdCaptcha class="mt-2" v-model:captcha_key="form.captcha_key" v-model:captcha_code="form.captcha_code" />
          </div>

          <FormButton class="w-full primary" :disabled="error.hasError">登录</FormButton>
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
        <img src="/images/login.jpg" class="absolute h-full w-full object-cover" />
      </div>
    </div>
  </form>
</template>

<style lang="scss">
form {
  @apply bg-slate-300 h-screen flex justify-center items-start md:items-center p-5;
}
</style>
