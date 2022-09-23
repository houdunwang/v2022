<script setup lang="ts">
import useAuth from '@/composables/useAuth'
import { reactive } from 'vue'
import Footer from './components/footer.vue'
import SendCode from '@/components/sendCode.vue'
const { register } = useAuth()

const form = reactive({
  mobile: '',
  password: '',
  password_confirm: '',
  code: '',
})

const onSubmit = async () => {
  await register(form)
}
</script>

<template>
  <form @submit.prevent="onSubmit">
    <div
      class="w-[720px] translate-y-32 md:translate-y-0 bg-gray-50 md:grid grid-cols-2 rounded-md shadow-md overflow-hidden">
      <div class="p-6 flex flex-col justify-between">
        <div>
          <h2 class="text-center text-gray-700 text-lg mt-3">会员注册</h2>
          <div class="mt-8">
            <FormInputComponent v-model="form.mobile" placeholder="请输入手机号" v-clearError="'mobile'" />
            <HdError name="mobile" />

            <FormInputComponent
              v-model="form.password"
              class="mt-3"
              type="password"
              placeholder="密码"
              v-clearError="'password'" />
            <HdError name="password" />

            <FormInputComponent v-model="form.password_confirm" class="mt-3" type="password" placeholder="确认密码" />

            <SendCode v-model:mobile="form.mobile" v-model:code="form.code" />
          </div>

          <FormButtonComponent class="w-full primary mt-2">注册</FormButtonComponent>
        </div>
        <Footer />
      </div>
      <div class="hidden md:block relative">
        <img src="/images/register.jpg" class="absolute h-full w-full object-cover" />
      </div>
    </div>
  </form>
</template>

<style lang="scss" scoped>
form {
  @apply bg-slate-300 h-screen flex justify-center items-start md:items-center p-5;
}
</style>
