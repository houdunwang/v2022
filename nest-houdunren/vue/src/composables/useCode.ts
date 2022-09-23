import { http } from '@/plugins/axios'

export default () => {
  const sendCode = (data: { mobile: any }) => {
    http.request({
      url: 'code/send',
      method: 'POST',
      data,
    })
  }

  return { sendCode }
}
