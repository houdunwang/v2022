<script setup lang="ts">
import { TableButton, TableFieldType } from '@/config/table'
import { ArrowDown } from '@element-plus/icons-vue'
import dayjs from 'dayjs'

const props = withDefaults(
  defineProps<{
    columns: TableFieldType[]
    button?: TableButton[]
    buttonWidth?: number
    search?: boolean
    searchField?: string
    api: (page?: number, params?: any) => Promise<ResponsePageResult<Record<string, any>>>
  }>(),
  {
    search: false,
  },
)

const emit = defineEmits<{
  (e: 'action', model: any, command: string): void
}>()

const data = await props.api()
const response = ref(data)

const searchField = ref(props.searchField)
const searchWord = ref('')

const load = async (page: number = 1) => {
  response.value = await props.api(page, { key: searchField.value, content: searchWord.value })
}

const buttonCommand = (args: any) => {
  emit('action', args.model, args.command)
}
</script>

<template>
  <div class="flex bg-white border mb-2 p-2" v-if="props.search">
    <el-select v-model="searchField" clearable filterable class="mr-1">
      <el-option v-for="col in props.columns" :key="col.id" :label="col.label" :value="col.id"> </el-option>
    </el-select>
    <el-input v-model="searchWord" size="default" class="mr-1" @keyup.enter="load(1)"></el-input>
    <el-button type="primary" size="default" @click="load(1)">搜索</el-button>
  </div>

  <el-table :data="response.data" border stripe style="width: 100%">
    <el-table-column
      v-for="col in props.columns"
      :prop="col.id"
      :key="col.id"
      :label="col.label"
      :width="col.width"
      #default="{ row }">
      <template v-if="col.type === 'image'">
        <el-image
          class="rounded-md"
          :preview-teleported="true"
          :hide-on-click-modal="true"
          :src="row[col.id]"
          fit="cover"
          :lazy="true"
          :preview-src-list="[row[col.id]]" />
      </template>
      <template v-else-if="col.type === 'date'">
        {{ dayjs(row[col.id]).format('YYYY-mm-DD') }}
      </template>
      <template v-else-if="col.type === 'tag'">
        <div class="flex gap-1">
          <el-tag type="success" size="small" effect="dark" v-for="p in row[col.id]">
            {{ p[col.tag_field!] }}
          </el-tag>
        </div>
      </template>
      <template v-else>
        {{ row[col.id] }}
      </template>
    </el-table-column>

    <el-table-column
      #default="{ row }"
      label="操作"
      align="center"
      :width="120"
      v-if="props.button?.length"
      fixed="right">
      <el-dropdown type="primary" @command="buttonCommand">
        <el-button type="primary">
          操作 <el-icon class="el-icon--right"><arrow-down /></el-icon>
        </el-button>
        <template #dropdown>
          <el-dropdown-menu>
            <el-dropdown-item
              v-for="(item, key) in props.button"
              :key="key"
              :command="{ model: row, command: item.command }">
              {{ item.title }}
            </el-dropdown-item>
          </el-dropdown-menu>
        </template>
      </el-dropdown>

      <!-- <el-button-group>
        <el-button
          :type="btn.type ?? 'default'"
          size="default"
          v-for="btn in props.button"
          @click="emit('action', row, btn.command)">
          {{ btn.title }}
        </el-button>
      </el-button-group> -->
    </el-table-column>

    <el-table-column #default="{ row }" :width="props.buttonWidth" v-if="$slots.button" fixed="right" align="center">
      <slot name="button" :model="row" />
    </el-table-column>
  </el-table>

  <el-pagination
    background
    layout="prev, pager, next"
    :total="response.meta.total"
    :hide-on-single-page="true"
    :page-size="response.meta.per_page"
    class="mt-3"
    @current-change="load" />
</template>

<style lang="scss"></style>
