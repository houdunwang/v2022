import { app } from '@/config/app'
import { Inject, Injectable } from '@nestjs/common'
import { ConfigType } from '@nestjs/config'
import _ from 'lodash'
import { paginate } from './../helper'
import { PrismaService } from './../prisma/prisma.service'
import { CreateLessonDto } from './dto/create-lesson.dto'
import { UpdateLessonDto } from './dto/update-lesson.dto'

@Injectable()
export class LessonService {
  constructor(private prisma: PrismaService, @Inject(app.KEY) private appConfig: ConfigType<typeof app>) {}

  create(createLessonDto: CreateLessonDto) {
    return this.prisma.lesson.create({
      data: {
        ..._.omit(createLessonDto, ['tagId', 'videos']),
        LessonTag: {
          createMany: {
            data: createLessonDto.tagId.map((tagId) => ({ tagId })),
          },
        },
        videos: {
          createMany: {
            data: createLessonDto.videos,
          },
        },
      },
    })
  }

  async findAll(page: number) {
    const data = await this.prisma.lesson.findMany({
      skip: (page - 1) * this.appConfig.lesson_page_row,
      take: this.appConfig.lesson_page_row,
    })

    const total = await this.prisma.lesson.count()
    return paginate({
      data,
      page,
      row: this.appConfig.lesson_page_row,
      total,
    })
  }

  findOne(id: number) {
    return this.prisma.lesson.findUnique({ where: { id }, include: { videos: true } })
  }

  update(id: number, updateLessonDto: UpdateLessonDto) {
    return this.prisma.lesson.update({
      where: { id },
      data: {
        ..._.omit(updateLessonDto, ['tagId', 'videos']),
        LessonTag: {
          deleteMany: { lessonId: updateLessonDto.id },
          createMany: {
            data: updateLessonDto.tagId.map((tagId) => ({ tagId })),
          },
        },
        videos: {
          deleteMany: { lessonId: updateLessonDto.id },
          createMany: {
            data: updateLessonDto.videos.map((video) => ({ ...video, id: video.id ? +video.id : undefined })),
          },
        },
      },
    })
  }

  remove(id: number) {
    return this.prisma.lesson.delete({ where: { id } })
  }
}
