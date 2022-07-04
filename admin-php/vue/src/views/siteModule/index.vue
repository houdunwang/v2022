<script setup lang="ts">
import { apiSiteFind } from '@/apis/site'
import { addSiteModule } from '@/apis/siteModule'
import useSiteModule from '@/composables/useSiteModule'
const { sid } = defineProps<{ sid: any }>()
const site = await apiSiteFind(sid)
const { modules, getModuleList, setDefaultModule, delModule } = useSiteModule()
await getModuleList(sid)
const selectModule = async (module: ModuleModel) => {
  try {
    await addSiteModule(site.id, module.id)
    getModuleList(sid)
  } catch (error) {}
}
</script>

<template>
  <HdTab
    :tabs="[
      { label: '站点列表', route: { name: 'site.index' } },
      { label: `【${site.title}】模块设置`, route: { name: 'site.module.index' } },
    ]" />

  <ModuleSelectModule @select="selectModule" class="mb-2" />

  <section class="module-list">
    <el-card shadow="hover" :body-style="{ padding: '20px' }" v-for="module of modules.data" :key="module.id">
      <div class="item">
        <img :src="module.preview" class="object-cover w-[30%] rounded-lg" />
        <h4>
          {{ module.title }}
          <el-tag type="success" size="small" effect="dark" v-if="site.module?.id == module.id">默认</el-tag>
        </h4>
        <el-button-group>
          <el-button type="danger" size="default" @click="delModule(sid, module)">删除</el-button>
          <el-button type="primary" size="default" @click="setDefaultModule(sid, module)">设为默认</el-button>
        </el-button-group>
      </div>
    </el-card>
  </section>

  <el-pagination
    background
    layout="prev, pager, next"
    :total="modules?.meta.total"
    :hide-on-single-page="true"
    :page-size="modules.meta.per_page"
    class="mt-3"
    @current-change="getModuleList(sid, $event)" />
</template>

<style lang="scss" scoped>
section.module-list {
  @apply grid lg:grid-cols-6 gap-3;
  .item {
    @apply flex flex-col items-center justify-center;

    h4 {
      @apply my-3 font-bold;
    }
  }
}
</style>
