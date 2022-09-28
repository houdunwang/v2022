<script setup lang="ts">
import useVideo from '@/composables/useVideo'
import router from '@/router'
import { onMounted } from 'vue'
import { useRoute } from 'vue-router'
import Player from 'xgplayer'
const { findOne, video } = useVideo()
const route = useRoute()
await findOne(+route.params.id)

onMounted(() => {
  let player = new Player({
    id: 'mse',
    url: video.value?.path!,
    fluid: true,
    poster: 'http://localhost:3000/assets/user/文件1.jpg',
  })
})
</script>

<template>
  <main>
    <div id="mse"></div>
    <div class="border font-bold px-5 py-3">
      {{ video.title }}
    </div>
    <Comment class="mt-3" type="video" :id="video.id" />
  </main>
</template>

<style lang="scss"></style>
