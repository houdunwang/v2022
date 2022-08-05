import { Controller, Get } from '@nestjs/common'
import { ConfigService } from './config/config.service'

@Controller()
export class AppController {
  constructor(private readonly config: ConfigService) {}

  @Get()
  getHello(): any {
    return this.config.get('app.name')
  }
}
