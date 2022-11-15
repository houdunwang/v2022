<script setup lang="ts">
const route = useRoute()
const { find, model } = useLesson()

await find(route.params.id)
</script>

<template>
  <main class="!w-screen !p-0 !mt-0 relative">
    <div class="relative">
      <section class="py-16 xl:w-page m-auto text-gray-50">
        <h1 class="font-bold text-3xl mb-5">
          {{ model?.title }}
          <el-tag type="danger" size="large" effect="dark">实战课程</el-tag>
        </h1>
        <div class="">
          {{ model?.description }}
        </div>
      </section>
      <div class="bg"></div>
    </div>
    <!-- 视频列表 -->
    <div class="mx-auto xl:w-page mt-5">
      <section v-if="model?.videos.length">
        <HdCard>
          <template #header>视频列表</template>
          <div v-for="item of model.videos">
            <VideoItem :video="item" />
          </div>
        </HdCard>
      </section>
      <section v-else>
        <AppTip> 视频录制中 </AppTip>
      </section>
    </div>
    <!-- 视频列表 END-->
  </main>
</template>

<style lang="scss" scoped>
.bg {
  background-image: url('/images/forget-password.jpg');
  background-size: cover;
  background-position: top;
  filter: blur(1px);
  z-index: -1;
  @apply absolute top-0 bottom-0 left-0 right-0;
}
</style>
