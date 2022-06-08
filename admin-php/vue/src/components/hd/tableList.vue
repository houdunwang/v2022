<script setup lang="ts">
import { TableButton, TableFieldType } from '@/config/table'
import dayjs from 'dayjs'
const props = defineProps<{
  columns: TableFieldType[]
  button: TableButton[]
  api: (page?: number) => Promise<ResponsePageResult<Record<string, any>>>
}>()
const emit = defineEmits<{
  (e: 'action', mode: Record<string, any>, command: string): void
}>()
const response = ref(await props.api())

const load = async (page: number) => {
  response.value = await props.api(page)
}
</script>

<template>
  <el-table :data="response.data" border stripe>
    <el-table-column
      v-for="col in props.columns"
      :prop="col.id"
      :key="col.id"
      :label="col.label"
      :width="col.width"
      #default="{ row }">
      <template v-if="col.type === 'image'">
        <img :src="row[col.id]" width="50" height="50" />
      </template>
      <template v-else-if="col.type === 'date'">
        {{ dayjs(row[col.id]).format('YYYY-mm-DD') }}
      </template>
      <template v-else>
        {{ row[col.id] }}
      </template>
    </el-table-column>

    <el-table-column :width="props.button.length * 80" #default="{ row }">
      <el-button-group>
        <el-button
          :type="btn.type ?? 'default'"
          size="default"
          v-for="btn in props.button"
          @click="emit('action', row, btn.command)">
          {{ btn.title }}
        </el-button>
      </el-button-group>
    </el-table-column>
  </el-table>

  <el-pagination
    background
    layout="prev, pager, next"
    :total="response.meta.total"
    :hide-on-single-page="true"
    :page-size="response.meta.per_page"
    @current-change="load" />
</template>

<style lang="scss"></style>
