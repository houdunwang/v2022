<script setup lang="ts">
const { getTicket, ticket, login } = useWechatLogin()
await getTicket()
const showDialog = ref(false)

const time = setInterval(async () => {
  await login()
}, 3000)
</script>

<template>
  <main class="">
    <el-dialog title="扫码登录" v-model="showDialog" width="30%" append-to-body>
      <el-image :src="`/api/wechat/qr_image/${ticket['ticket']}`" fit="fill" :lazy="true"></el-image>
    </el-dialog>
    <icon-wechat theme="outline" size="24" class="text-green-600 cursor-pointer" @click="showDialog = true" />
  </main>
</template>

<style lang="scss"></style>
