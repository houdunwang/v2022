import { MessagePlugin } from 'tdesign-vue-next'
import store from '@/utils/store'
import { ApiSendCode, ApiSendToExistUser, ApiSendToNotExistUser } from '@/apis/commonApi'
import dayjs from 'dayjs'

export type ICodeType = 'any' | 'notExist' | 'exist'
export default () => {
  const sendCode = async (account: string, type: ICodeType = 'any') => {
    switch (type) {
      case 'notExist':
        await ApiSendToNotExistUser(account)

        break
      case 'exist':
        await ApiSendToExistUser(account)
        break
      default:
        await ApiSendCode(account)
    }
    store.set('codeSendTime', dayjs())
    MessagePlugin.success('验证码发送成功')
  }

  const sendTime = () => {
    const time = store.get('codeSendTime')
    return time ? 60 - dayjs().diff(time, 'second') : -1
  }

  return { sendCode, sendTime }
}
