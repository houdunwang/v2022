import { skip } from 'rxjs'
import { PrismaService } from '@/prisma/prisma.service'
import { Inject, Injectable } from '@nestjs/common'
import { app } from '@/config/app'
import { ConfigType } from '@nestjs/config'
import { paginate } from '@/helper'

@Injectable()
export class VideoService {
  @Inject()
  private prisma: PrismaService

  @Inject(app.KEY)
  private appConfig: ConfigType<typeof app>

  async findAll(page: number) {
    const row = this.appConfig.video_page_row
    const data = await this.prisma.video.findMany({
      skip: (page - 1) * row,
      take: row,
    })

    const total = await this.prisma.video.count()

    return paginate({ data, row, page, total })
  }

  async findOne(id: number) {
    return this.prisma.video.findUnique({
      where: { id: +id },
    })
  }
}
