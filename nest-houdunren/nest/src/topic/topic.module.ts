import { Module } from '@nestjs/common'
import { TopicService } from './topic.service'
import { TopicController } from './topic.controller'

@Module({
  controllers: [TopicController],
  providers: [TopicService],
})
export class TopicModule {}
