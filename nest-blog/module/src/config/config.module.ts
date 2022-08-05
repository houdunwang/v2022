import { DynamicModule, Module } from '@nestjs/common'
import { ConfigService } from './config.service'

@Module({
  providers: [ConfigService],
  exports: [ConfigService],
})
export class ConfigModule {
  static forRoot(options: { path: string }): DynamicModule {
    return {
      global: true,
      module: ConfigModule,
      providers: [{ provide: 'CONFIG_OPTIONS', useValue: options }],
    }
  }
}
