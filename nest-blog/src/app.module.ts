import { ConfigService } from './config.service'
import { AppService } from './app.service'
import { Module } from '@nestjs/common'
import { AppController } from './app.controller'
import { DbService } from './db.service'
import { HdModule } from './hd/hd.module'
import { TestModule } from './test/test.module'

@Module({
  imports: [HdModule, TestModule],
  controllers: [AppController],
  providers: [
    AppService,
    ConfigService,
    {
      provide: 'DbService',
      inject: ['ConfigService'],
      useFactory(configService) {
        return new DbService(configService)
      },
    },
  ],
})
export class AppModule {}

// const providers = [
//   {
//     provide: HdService,
//     useClass: HdService,
//   },
// ]
