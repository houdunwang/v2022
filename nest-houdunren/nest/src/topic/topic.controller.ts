import { Auth } from '@/auth/decorator/auth.decorator'
import { CurrentUser } from '@/auth/decorator/user.decorator'
import { Policy } from '@/casl/policy.decortor'
import { Body, Controller, DefaultValuePipe, Delete, Get, Param, Patch, Post, Query } from '@nestjs/common'
import { User } from '@prisma/client'
import { CreateTopicDto } from './dto/create-topic.dto'
import { UpdateTopicDto } from './dto/update-topic.dto'
import { TopicService } from './topic.service'

@Controller('topic')
export class TopicController {
  constructor(private readonly topicService: TopicService) {}

  @Post()
  @Auth()
  create(@Body() createTopicDto: CreateTopicDto, @CurrentUser() user: User) {
    return this.topicService.create(createTopicDto, user)
  }

  @Get()
  findAll(@Query('page', new DefaultValuePipe(1)) page: number) {
    return this.topicService.findAll(page)
  }

  @Get(':id')
  findOne(@Param('id') id: string) {
    return this.topicService.findOne(+id)
  }

  @Patch(':id')
  @Policy({ action: 'update', type: 'Topic' })
  async update(@Param('id') id: string, @Body() updateTopicDto: UpdateTopicDto) {
    return this.topicService.update(+id, updateTopicDto)
  }

  @Delete(':id')
  @Policy({ action: 'delete', type: 'Topic' })
  remove(@Param('id') id: string) {
    return this.topicService.remove(+id)
  }
}
