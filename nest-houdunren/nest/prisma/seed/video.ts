import { PrismaClient } from '@prisma/client'
import { Random } from 'mockjs'
import { create } from '../helper'

export default async () => {
  await create(20, (prisma: PrismaClient) => {
    return prisma.video.create({
      data: {
        title: Random.ctitle(),
        path: 'http://aaa.mp4',
        lessonId: Random.integer(1, 20),
      },
    })
  })
}
