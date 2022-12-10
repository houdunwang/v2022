import { http } from '@/plugins/axios'
export default () => {
  const ticket = ref<any>()
  const getTicket = async () => {
    const { data } = await http.request<ApiData<any>>({
      url: `wechat/ticket`,
    })

    ticket.value = data
  }

  const login = async () => {
    const { data } = await http.request<any>({
      url: `wechat/login/${ticket.value.ticket}`,
    })
    if (data?.user) location.href = '/'
  }

  return { ticket, getTicket, login }
}
