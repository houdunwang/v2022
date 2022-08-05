import { DbService } from './db.service'
import { Controller, Get, Inject } from '@nestjs/common'
import { AppService } from './app.service'

@Controller()
export class AppController {
  constructor(
    private readonly appService: AppService,
    @Inject('DbService')
    private readonly dbService: string,
  ) {}

  @Get()
  getHello(): string {
    return this.dbService
  }
}
