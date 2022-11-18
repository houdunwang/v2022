<script setup lang="ts">
const { isAdministrator } = useAuth()
const { lesson } = defineProps<{ lesson: LessonModel }>()

const { del } = useLesson()
</script>

<template>
  <section class="border rounded-md overflow-hidden bg-white">
    <RouterLink :to="{ name: 'lesson.show', params: { id: lesson.id } }">
      <el-image :src="lesson.preview" fit="cover" :lazy="true" />
      <div class="p-3 text-center border-t">
        {{ lesson.title }}
      </div>
    </RouterLink>

    <slot>
      <div class="flex py-3 justify-center border-t" v-if="isAdministrator()">
        <el-button
          type="primary"
          size="small"
          @click="$router.push({ name: 'admin.lesson.edit', params: { id: lesson.id } })">
          编辑
        </el-button>
        <el-button type="danger" size="small" @click="del(lesson.id)">删除</el-button>
      </div>
    </slot>
  </section>
</template>

<style lang="scss"></style>
