import { paginate } from './../helper'
import { ConfigType } from '@nestjs/config'
import { PrismaService } from './../prisma/prisma.service'
import { Inject, Injectable } from '@nestjs/common'
import { CreateLessonDto } from './dto/create-lesson.dto'
import { UpdateLessonDto } from './dto/update-lesson.dto'
import { app } from '@/config/app'

@Injectable()
export class LessonService {
  constructor(private prisma: PrismaService, @Inject(app.KEY) private appConfig: ConfigType<typeof app>) {}

  create(createLessonDto: CreateLessonDto) {
    return this.prisma.lesson.create({
      data: createLessonDto,
    })
  }

  async findAll(page: number) {
    const data = await this.prisma.lesson.findMany({
      skip: (page - 1) * this.appConfig.page_row,
      take: this.appConfig.page_row,
    })

    const total = await this.prisma.lesson.count()
    return paginate({
      data,
      page,
      row: this.appConfig.page_row,
      total,
    })
  }

  findOne(id: number) {
    return this.prisma.lesson.findUnique({ where: { id } })
  }

  update(id: number, updateLessonDto: UpdateLessonDto) {
    return this.prisma.lesson.update({
      where: { id },
      data: updateLessonDto,
    })
  }

  remove(id: number) {
    return this.prisma.lesson.delete({ where: { id } })
  }
}
