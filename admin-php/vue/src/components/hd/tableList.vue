<script setup lang="ts">
import { TableButton, TableFieldType } from '@/config/table'
import dayjs from 'dayjs'
import { ElMessage } from 'element-plus'

const props = defineProps<{
  columns: TableFieldType[]
  button: TableButton[]
  buttonWidth: number
  api: (page?: number, params?: {}) => Promise<ResponsePageResult<Record<string, any>>>
}>()

const emit = defineEmits<{
  (e: 'action', mode: Record<string, any>, command: string): void
}>()
const data = await props.api()
const response = ref(data)

const load = async (page: number, params: {}) => {
  response.value = await props.api(page, params)
}

const searchField = ref('')
const searchWord = ref('')
const search = () => {
  load(1, { key: searchField.value, content: searchWord.value })
}
</script>

<template>
  <div class="flex bg-white border mb-2 p-2">
    <el-select v-model="searchField" clearable filterable class="mr-1">
      <el-option v-for="col in props.columns" :key="col.id" :label="col.label" :value="col.id"> </el-option>
    </el-select>
    <el-input v-model="searchWord" size="default" class="mr-1" @keyup.enter="search"></el-input>
    <el-button type="primary" size="default" @click="search">搜索</el-button>
  </div>

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

    <el-table-column #default="{ row }" :width="props.buttonWidth">
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
