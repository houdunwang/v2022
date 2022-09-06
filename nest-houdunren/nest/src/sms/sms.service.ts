import { ForbiddenException, Injectable } from '@nestjs/common'
import Dysmsapi20170525, * as $Dysmsapi20170525 from '@alicloud/dysmsapi20170525'
import * as $OpenApi from '@alicloud/openapi-client'
import * as $Util from '@alicloud/tea-util'
import { ConfigService } from '../config/config.service'

@Injectable()
//短信服务
export class SmsService {
  constructor(private configService: ConfigService) {}
  /**
   * 使用AK&SK初始化账号Client
   * @param accessKeyId
   * @param accessKeySecret
   * @return Client
   * @throws Exception
   */
  createClient(): Dysmsapi20170525 {
    const config = new $OpenApi.Config({
      // 您的 AccessKey ID
      accessKeyId: this.configService.aliyun.access_key,
      // 您的 AccessKey Secret
      accessKeySecret: this.configService.aliyun.access_secret,
    })
    // 访问的域名
    config.endpoint = `dysmsapi.aliyuncs.com`
    return new Dysmsapi20170525(config)
  }

  /**
   * 发送模板消息
   * @param signName 短信签名
   * @param templateCode 模板
   * @param phoneNumbers 手机号
   * @param templateParam 模板参数
   */
  async send(
    signName: string,
    templateCode: string,
    phoneNumbers: any,
    templateParam: Record<string, any>,
  ): Promise<void> {
    const client = this.createClient()
    const sendSmsRequest = new $Dysmsapi20170525.SendSmsRequest({
      signName,
      templateCode,
      phoneNumbers,
      templateParam: JSON.stringify(templateParam),
    })
    const runtime = new $Util.RuntimeOptions({})
    // 复制代码运行请自行打印 API 的返回值
    const r = await client.sendSmsWithOptions(sendSmsRequest, runtime)
    if (r.body.code != 'OK') throw new ForbiddenException()
  }

  /**
   * 发送短信验证码
   * @param phoneNumbers 手机号
   * @returns
   */
  async code(phoneNumbers: any): Promise<void> {
    return this.send(this.configService.aliyun.sms_sign, this.configService.aliyun.sms_code_template, phoneNumbers, {
      code: this.createCode(),
      product: this.configService.aliyun.sms_sign,
    })
  }

  /**
   * 生成随机验证码
   * @param phoneNumbers 手机号
   * @returns
   */
  private createCode() {
    const code = Math.ceil(Math.random() * 8888) + 1000
    return code
  }
}
