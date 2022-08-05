import { ConfigService } from './../config/config.service'
import { Controller, Get } from '@nestjs/common'

@Controller('article')
export class ArticleController {
  constructor(private readonly config: ConfigService) {}
  @Get()
  index() {
    return 'index article=>' + this.config.get('app.name')
  }
}
