import { TestModule } from './../test/test.module'
import { Module } from '@nestjs/common'
import { HdService } from './hd.service'
import { HdController } from './hd.controller'

@Module({
  imports: [TestModule],
  providers: [HdService],
  controllers: [HdController],
})
export class HdModule {}
