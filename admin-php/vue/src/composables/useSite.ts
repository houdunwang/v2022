import { apiSiteFind } from '@/apis/site'
export default async function () {
  const route = useRoute()
  const site = $ref(await apiSiteFind(route.params.sid))

  return { site }
}
