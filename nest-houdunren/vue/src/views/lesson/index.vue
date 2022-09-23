<script setup lang="ts">
import useLesson from '@/composables/useLesson'

const { collection, findAll } = useLesson()
await findAll()
</script>

<template>
  <main>
    <el-card shadow="always" :body-style="{ padding: '20px' }">
      <template #header>
        <div>实战课程</div>
      </template>
      <section class="grid grid-cols-3 gap-3">
        <div
          v-for="lesson of collection.data"
          :key="lesson.id"
          class="border cursor-pointer"
          @click="$router.push({ name: 'lesson.show', params: { id: lesson.id } })">
          <el-image :src="lesson.preview" fit="cover" :lazy="true" class=""></el-image>
          <h4 class="text-center py-2 font-bold text-gray-700">{{ lesson.title }}</h4>
        </div>
      </section>
    </el-card>

    <el-pagination
      @current-change="findAll"
      :page-size="collection.meta.row"
      :total="collection.meta.total"
      background
      class="bg-white p-3 mt-3" />
  </main>
</template>

<style lang="scss"></style>
