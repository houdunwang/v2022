<script setup lang="ts">
const { isAdministrator } = useAuth()
const { del } = useSystem()
const { system } = defineProps<{ system: SystemModel }>()
</script>

<template>
  <section class="border rounded-md overflow-hidden bg-white">
    <RouterLink :to="{ name: 'system.show', params: { id: system.id } }">
      <el-image :src="system.preview" fit="cover" :lazy="true" />
      <div class="p-3 text-center border-t">
        {{ system.title }}
      </div>
    </RouterLink>
    <slot>
      <div class="flex py-3 justify-center border-t" v-if="isAdministrator()">
        <el-button
          type="primary"
          size="small"
          @click="$router.push({ name: 'admin.system.edit', params: { id: system.id } })"
          >编辑</el-button
        >
        <el-button type="danger" size="small" @click="del(system.id)">删除</el-button>
      </div>
    </slot>
  </section>
</template>

<style lang="scss"></style>
