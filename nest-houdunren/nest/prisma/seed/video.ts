import { PrismaClient } from '@prisma/client'
import { Random } from 'mockjs'
import { create } from '../helper'

export default async () => {
  await create(60, (prisma: PrismaClient) => {
    return prisma.video.create({
      data: {
        title: Random.ctitle(),
        path: 'https://houdunren-test.oss-cn-hangzhou.aliyuncs.com/videos/test.mp4',
        lessonId: Random.integer(1, 15),
      },
    })
  })
}
