import { CacheModule, Module } from '@nestjs/common'
import { ConfigModule } from '@nestjs/config'
import * as redisStore from 'cache-manager-redis-store'
import { AliyunModule } from './aliyun/aliyun.module'
import { AppController } from './app.controller'
import { AuthModule } from './auth/auth.module'
import { CaslModule } from './casl/casl.module'
import { CommentModule } from './comment/comment.module'
import configs from './config/index'
import { LessonModule } from './lesson/lesson.module'
import { PrismaModule } from './prisma/prisma.module'
import { SystemModule } from './system/system.module'
import { TagModule } from './tag/tag.module'
import { TopicModule } from './topic/topic.module'
import { UploadModule } from './upload/upload.module'
import { VideoModule } from './video/video.module'

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
    SystemModule,
    TagModule,
    TopicModule,
    CaslModule,
    VideoModule,
    CommentModule,

    UploadModule,
  ],
  controllers: [AppController],
  providers: [],
})
export class AppModule {}
