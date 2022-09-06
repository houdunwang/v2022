import { Global, Module } from '@nestjs/common'
import { SmsService } from './sms.service'

@Global()
@Module({
  providers: [SmsService],
  exports: [SmsService],
})
export class SmsModule {}
