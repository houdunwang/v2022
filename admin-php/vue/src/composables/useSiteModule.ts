import { delSiteModule, setSiteDefaultModule } from '@/apis/siteModule'
import { getSiteModuleList } from '@/apis/siteModule'
import { Ref } from 'vue'

export default () => {
  const modules = ref() as unknown as Ref<ResponsePageResult<ModuleModel>>

  const getModuleList = async (sid: number, page = 1, row = 18) => {
    modules.value = await getSiteModuleList(sid, page, { row })
  }

  const delModule = async (sid: number, module: ModuleModel) => {
    try {
      await delSiteModule(sid, module.id)
      getModuleList(sid)
    } catch (error) {}
  }

  const setDefaultModule = async (sid: number, module: ModuleModel) => {
    await setSiteDefaultModule(sid, module.id)
  }

  return { modules, delModule, setDefaultModule, getModuleList }
}
