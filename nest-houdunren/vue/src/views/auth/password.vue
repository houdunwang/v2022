<script setup lang="ts">
import useAuth from '@/composables/useAuth'
import { Wechat } from '@icon-park/vue-next'
import { reactive } from 'vue'
import Footer from './components/footer.vue'
const { forgetPassword } = useAuth()

const form = reactive({
  mobile: '18600276067',
  password: 'admin888',
  password_confirm: 'admin888',
  code: '',
})

const onSubmit = async () => {
  await forgetPassword(form)
}
</script>

<template>
  <form @submit.prevent="onSubmit">
    <div
      class="w-[720px] translate-y-32 md:translate-y-0 bg-gray-50 md:grid grid-cols-2 rounded-md shadow-md overflow-hidden">
      <div class="p-6 flex flex-col justify-between">
        <div>
          <h2 class="text-center text-gray-700 text-lg mt-3">找回密码</h2>
          <div class="mt-8">
            <FormInputComponent v-model="form.mobile" placeholder="请输入手机号" v-clearError="'mobile'" />
            <HdError name="mobile" />

            <FormInputComponent v-model="form.password" class="mt-3" type="password" placeholder="请输入新密码" />
            <HdError name="password" />

            <FormInputComponent
              v-model="form.password_confirm"
              class="mt-3"
              type="password"
              placeholder="再次输入密码" />

            <SendCode v-model:mobile="form.mobile" v-model:code="form.code" />
          </div>

          <FormButtonComponent class="w-full primary mt-2">确定修改</FormButtonComponent>
        </div>
        <Footer />
      </div>
      <div class="hidden md:block relative">
        <img src="/images/forget-password.jpg" class="absolute h-full w-full object-cover" />
      </div>
    </div>
  </form>
</template>

<style lang="scss" scoped>
form {
  @apply bg-slate-300 h-screen flex justify-center items-start md:items-center p-5;
}
</style>
