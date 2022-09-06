import { SmsService } from './sms/sms.service'
import { Controller, Get } from '@nestjs/common'
import { AppService } from './app.service'

@Controller()
export class AppController {
  constructor(private readonly appService: AppService, private smsService: SmsService) {}

  @Get()
  async getHello() {
    await this.smsService.code(process.env.MOBILE)
    return this.appService.getHello()
  }
}
