import { PolicyGuard } from './policy.guard'
import { Global, Module } from '@nestjs/common'

@Global()
@Module({
  providers: [PolicyGuard],
  exports: [],
})
export class CaslModule {}
