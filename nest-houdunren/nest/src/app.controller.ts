import { app } from '@/config/app'
import { Controller, Get, Inject } from '@nestjs/common'
import { ConfigType } from '@nestjs/config'
import { CodeService } from './aliyun/code.service'
import { success } from './helper'

@Controller()
export class AppController {
  constructor(private codeService: CodeService, @Inject(app.KEY) private appConfig: ConfigType<typeof app>) {}

  @Get()
  async getHello() {
    await this.codeService.code(this.appConfig.mobile)
    return success('短信发送成功')
  }
}
