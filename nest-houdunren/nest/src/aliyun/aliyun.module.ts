import { CodeService } from './code.service'
import { Global, Module } from '@nestjs/common'
import { CodeController } from './code.controller'

@Global()
@Module({
  providers: [CodeService],
  exports: [CodeService],
  controllers: [CodeController],
})
export class AliyunModule {}
