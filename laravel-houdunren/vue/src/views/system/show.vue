<script setup lang="ts">
const route = useRoute()
const { find, model } = useSystem()

await find(route.params.id)
</script>

<template>
  <main class="!w-screen !p-0 !mt-0">
    <div class="bg-gray-700">
      <section class="py-16 xl:w-page m-auto text-gray-50">
        <h1 class="font-bold text-3xl mb-5">
          {{ model?.title }}
          <el-tag type="danger" size="large" effect="dark">系统课程</el-tag>
        </h1>
        <div class="">
          {{ model?.description }}
        </div>
      </section>
    </div>
    <!-- 课程列表 -->
    <div class="mx-auto xl:w-page mt-5">
      <section v-if="model?.lessons.length">
        <HdCard>
          <template #header>课程列表</template>
          <div class="" v-for="item of model.lessons">
            <LessonItem :lesson="item" />
          </div>
        </HdCard>
      </section>
      <section v-else>
        <!-- <div class="">课程更新中</div> -->
        <AppTip> 课程更新中 </AppTip>
      </section>
    </div>
    <!-- 课程列表 END-->
  </main>
</template>

<style lang="scss"></style>
