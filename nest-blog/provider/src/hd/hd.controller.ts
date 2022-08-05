import { TestService } from './../test/test.service'
import { Controller, Get, Inject } from '@nestjs/common'

@Controller('hd')
export class HdController {
  constructor(private readonly test: TestService, @Inject('test') private testValue) {}
  @Get()
  show() {
    return this.test.get() + this.testValue
    // return 'hd show method'
  }
}
