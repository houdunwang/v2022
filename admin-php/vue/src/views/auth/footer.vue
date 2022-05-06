<script setup lang="ts"></script>

<template>
  <div class="flex gap-2 justify-center mt-5">
    <router-link to="/login" class="text-xs text-gray-700" v-if="$route.name != 'login'">会员登录</router-link>
    <router-link to="/register" class="text-xs text-gray-700" v-else>会员注册</router-link>
    <a href="#" class="text-xs text-gray-700">找回密码</a>
    <a href="#" class="text-xs text-gray-700">找回密码</a>
  </div>
</template>

<style lang="scss"></style>
