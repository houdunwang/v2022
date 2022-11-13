import { http } from '@/plugins/axios'
export default () => {
  const send = (mobile: any) => {
    http.request({
      url: 'code/send',
      method: 'POST',
      data: { mobile },
    })
  }
  return { send }
}
