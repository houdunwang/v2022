import { CacheModule, Module } from '@nestjs/common'
import { ConfigModule } from '@nestjs/config'
import { AliyunModule } from './aliyun/aliyun.module'
import { AppController } from './app.controller'
import { AuthModule } from './auth/auth.module'
import configs from './config/index'
import { PrismaModule } from './prisma/prisma.module'
import { LessonModule } from './lesson/lesson.module'
import { SystemModule } from './system/system.module'
import { TagModule } from './tag/tag.module'
import { TopicModule } from './topic/topic.module'
import { CaslModule } from './casl/casl.module'
import { VideoModule } from './video/video.module'
import { CommentModule } from './comment/comment.module'
import * as redisStore from 'cache-manager-redis-store'
import { MulterModule } from '@nestjs/platform-express'
import { diskStorage } from 'multer'
import { extname } from 'path'
import { UploadModule } from './upload/upload.module'

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
