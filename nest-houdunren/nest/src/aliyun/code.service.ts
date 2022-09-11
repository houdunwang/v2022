import Dysmsapi20170525, * as $Dysmsapi20170525 from '@alicloud/dysmsapi20170525'
import * as $OpenApi from '@alicloud/openapi-client'
import * as $Util from '@alicloud/tea-util'
import { BadRequestException, CACHE_MANAGER, ForbiddenException, Inject, Injectable } from '@nestjs/common'
import { ConfigType } from '@nestjs/config'
import { aliyun } from '@/config/aliyun'
import { Cache } from 'cache-manager'

@Injectable()
//验证服务
export class CodeService {
  constructor(
    @Inject(aliyun.KEY) private aliyunConfig: ConfigType<typeof aliyun>,
    @Inject(CACHE_MANAGER) private cacheService: Cache,
  ) {}
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
      accessKeyId: this.aliyunConfig.access_key,
      // 您的 AccessKey Secret
      accessKeySecret: this.aliyunConfig.access_secret,
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
  async code(phoneNumbers: any) {
    const code = this.createCode()
    await this.send(this.aliyunConfig.sms_sign, this.aliyunConfig.sms_code_template, phoneNumbers, {
      code,
      product: this.aliyunConfig.sms_sign,
    })

    await this.cacheService.set('H' + phoneNumbers, code, { ttl: 600 })
    return code
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

  async check(data: { mobile: string; code: string }) {
    const code = await this.cacheService.get('H' + data.mobile)
    if (!code || code != data.code) throw new ForbiddenException('验证码输入错误')
  }
}
