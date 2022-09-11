import { CacheModule, Module } from '@nestjs/common'
import { ConfigModule } from '@nestjs/config'
import { AliyunModule } from './aliyun/aliyun.module'
import { AppController } from './app.controller'
import { AuthModule } from './auth/auth.module'
import configs from './config/index'
import { PrismaModule } from './prisma/prisma.module'
import { LessonModule } from './lesson/lesson.module';
import * as redisStore from 'cache-manager-redis-store'

@Module({
  imports: [
    AliyunModule,
    ConfigModule.forRoot({ load: configs, isGlobal: true }),
    CacheModule.register({
      store: redisStore,
      host: 'localhost',
      port: 6379,
      isGlobal: true,
    }),
    AuthModule,
    PrismaModule,
    LessonModule,
  ],
  controllers: [AppController],
  providers: [],
})
export class AppModule {}
