<script setup lang="ts">
import { ElLoading } from 'element-plus'
import zhCn from 'element-plus/lib/locale/lang/zh-cn'
const loadingInstance = ElLoading.service({
  background: 'rgba(0, 0, 0, 0.6)',
})
const resolve = () => {
  loadingInstance.close()
}
</script>

<template>
  <el-config-provider :locale="zhCn">
    <router-view #default="{ Component }">
      <suspense @resolve="resolve">
        <template #default>
          <component :is="Component" />
        </template>
      </suspense>
    </router-view>
  </el-config-provider>
</template>
