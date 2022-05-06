import { getCaptcha, ICaptcha } from './../apis/commonApi'
const captcha = ref<ICaptcha>()

export default () => {
  const loadCaptcha = async () => {
    captcha.value = await getCaptcha()
  }

  return { captcha, loadCaptcha }
}
