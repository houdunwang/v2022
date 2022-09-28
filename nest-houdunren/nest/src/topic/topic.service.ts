import { ConfigType } from '@nestjs/config'
import { PrismaService } from './../prisma/prisma.service'
import { Inject, Injectable } from '@nestjs/common'
import { CreateTopicDto } from './dto/create-topic.dto'
import { UpdateTopicDto } from './dto/update-topic.dto'
import { app } from '@/config/app'
import { paginate } from '@/helper'
import { User } from '@prisma/client'
import _ from 'lodash'

@Injectable()
export class TopicService {
  constructor(private readonly prisma: PrismaService, @Inject(app.KEY) private appConfig: ConfigType<typeof app>) {}
  create(createTopicDto: CreateTopicDto, user: User) {
    return this.prisma.topic.create({
      data: { ...createTopicDto, userId: user.id },
    })
  }

  async findAll(page: number) {
    const data = await this.prisma.topic.findMany({
      skip: (page - 1) * this.appConfig.topic_page_row,
      take: this.appConfig.topic_page_row,
      orderBy: { id: 'desc' },
      include: {
        User: {
          select: { id: true, name: true, avatar: true },
        },
      },
    })

    const total = await this.prisma.topic.count({})
    return paginate({ page, data, row: this.appConfig.topic_page_row, total })
  }

  findOne(id: number) {
    return this.prisma.topic.findUnique({
      where: { id },
      include: {
        User: { select: { id: true, avatar: true, name: true } },
        comments: true,
      },
    })
  }

  update(id: number, updateTopicDto: UpdateTopicDto) {
    return this.prisma.topic.update({
      where: { id },
      data: { ..._.pick(updateTopicDto, ['title', 'content']) },
    })
  }

  remove(id: number) {
    return this.prisma.topic.delete({ where: { id } })
  }
}
