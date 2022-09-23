import { http } from '@/plugins/axios'
import { ref } from 'vue'

export default () => {
  const video = ref<VideoModel>()

  const findOne = async (id: number) => {
    video.value = await http
      .request<VideoModel>({
        url: `video/${id}`,
      })
      .then((r) => r.data)
  }

  return { findOne, video }
}
