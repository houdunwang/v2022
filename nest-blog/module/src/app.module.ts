import { Module } from '@nestjs/common'
import { AppController } from './app.controller'
import { AppService } from './app.service'
import { ConfigModule } from './config/config.module'
import { ArticleModule } from './article/article.module'
import path from 'path'

const configPath = path.resolve(__dirname, './configure')
@Module({
  imports: [ConfigModule.forRoot({ path: configPath }), ArticleModule],
  controllers: [AppController],
  providers: [AppService],
})
export class AppModule { }
