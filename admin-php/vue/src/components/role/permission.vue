<script setup lang="ts">
import { roleFind } from '@/apis/role'
import { setRolePermission } from '@/apis/role'
import { getSitePermissionTable } from '@/apis/permission'
const emit = defineEmits(['change'])

const { sid, rid } = defineProps<{ sid: any; rid: any }>()
let dialog = $ref(false)
const role = $ref(await roleFind(sid, rid))
const modules = ref(await getSitePermissionTable(sid))
const permissions = $ref(role.permissions.map((p) => p.name))

const onSubmit = async () => {
  try {
    await setRolePermission(sid, rid, permissions)
    dialog = false
    emit('change')
  } catch (error) {}
}
</script>

<template>
  <el-dialog title="角色权限" v-model="dialog" width="80%" append-to-body>
    <el-card
      class="mb-3"
      shadow="hover"
      :body-style="{ padding: '10px' }"
      v-for="(module, index) of modules"
      :key="index">
      <template #header>
        <h5>{{ module.title }}</h5>
      </template>
      <dl class="" v-for="(item, key) of module.permissions" :key="key">
        <dt>{{ item.title }}</dt>
        <dd>
          <label v-for="(p, key) of item.items" :key="key">
            <input type="checkbox" v-model="permissions" :value="p.name" />
            <div class="">
              {{ p.title }}
              <small> ({{ p.name }}) </small>
            </div>
          </label>
        </dd>
      </dl>
    </el-card>
    <el-button type="primary" size="default" @click="onSubmit">保存提交</el-button>
  </el-dialog>

  <el-button type="primary" size="default" @click="dialog = true"> 权限 </el-button>
</template>

<style lang="scss" scoped>
:deep(.el-card__header) {
  @apply py-3;
}
h5 {
  @apply flex items-center font-bold;
}
dl {
  @apply p-3 py-2 rounded-sm bg-white;
  dt {
    @apply mb-3;
  }
  dd {
    @apply flex text-xs;
    label {
      @apply flex  items-center gap-1 mr-3;
    }
  }
}
</style>
