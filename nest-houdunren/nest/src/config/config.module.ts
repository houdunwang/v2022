import { Global, Module } from '@nestjs/common'
import { ConfigService } from './config.service'
import { ConfigModule as NestConfigModule } from '@nestjs/config'
import configs from './data/index'

@Global()
@Module({
  imports: [
    NestConfigModule.forRoot({
      load: configs,
    }),
  ],
  providers: [ConfigService],
  exports: [ConfigService],
})
export class ConfigModule {}
