<script setup lang="ts">
const { url } = defineProps<{
  url: string
}>()

const dialog = $ref(false)
</script>

<template>
  <teleport to="body">
    <section>
      <el-dialog title="预览图片" v-model="dialog" width="30%" custom-class="dialog">
        <img :src="url" class="w-full" />
      </el-dialog>
    </section>
  </teleport>

  <el-avatar
    @click="dialog = true"
    icon="el-icon-user-solid"
    size="large"
    shape="square"
    :src="url"
    fit="cover"
    class="cursor-pointer" />
</template>

<style lang="scss" scoped>
:deep(.dialog) {
  @apply md:w-[600px] w-11/12;
}
</style>
