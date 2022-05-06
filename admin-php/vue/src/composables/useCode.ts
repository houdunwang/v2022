import { MessagePlugin } from 'tdesign-vue-next'
import store from '@/utils/store'
import { ApiSendCode } from '@/apis/commonApi'
import dayjs from 'dayjs'

export default () => {
  const sendCode = async (account: string) => {
    await ApiSendCode(account)
    store.set('codeSendTime', dayjs())
    MessagePlugin.success('验证码发送成功')
  }

  const sendTime = () => {
    const time = store.get('codeSendTime')
    return time ? 60 - dayjs().diff(time, 'second') : -1
  }

  return { sendCode, sendTime }
}
