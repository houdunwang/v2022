<script setup lang="ts">
import { getUserList } from '@/apis/userApi'
import dayjs from 'dayjs'
const props = defineProps<{ users: UserModel[] }>()

const columns = [
  { id: 'id', label: 'ID', width: 50 },
  { id: 'name', label: '昵称' },
  { id: 'avatar', label: '头像', type: 'image' },
  { id: 'created_at', label: '创建时间', type: 'date' },
  { id: 'updated_at', label: '更新时间', type: 'date' },
]
</script>

<template>
  <el-table :data="props.users" border stripe>
    <el-table-column
      v-for="col in columns"
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

    <el-table-column>
      <el-button-group>
        <el-button type="primary" size="default">锁定</el-button>
        <el-button type="primary" size="default">查看</el-button>
      </el-button-group>
    </el-table-column>
  </el-table>
</template>

<style lang="scss"></style>
