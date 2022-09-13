import { Controller, Get, Post, Body, Patch, Param, Delete } from '@nestjs/common'
import { TopicService } from './topic.service'
import { CreateTopicDto } from './dto/create-topic.dto'
import { UpdateTopicDto } from './dto/update-topic.dto'
import { Auth } from '@/auth/decorator/auth.decorator'
import { User } from '@/auth/decorator/user.decorator'
import { User as UserModel } from '@prisma/client'

@Controller('topic')
export class TopicController {
  constructor(private readonly topicService: TopicService) {}

  @Post()
  @Auth()
  create(@Body() createTopicDto: CreateTopicDto, @User() user: UserModel) {
    return this.topicService.create(createTopicDto, user)
  }

  @Get()
  findAll() {
    return this.topicService.findAll()
  }

  @Get(':id')
  findOne(@Param('id') id: string) {
    return this.topicService.findOne(+id)
  }

  @Patch(':id')
  @Auth()
  update(@Param('id') id: string, @Body() updateTopicDto: UpdateTopicDto) {
    return this.topicService.update(+id, updateTopicDto)
  }

  @Delete(':id')
  remove(@Param('id') id: string) {
    return this.topicService.remove(+id)
  }
}
