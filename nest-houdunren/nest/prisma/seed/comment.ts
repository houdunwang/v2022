import { PrismaClient } from '@prisma/client'
import { Random } from 'mockjs'
import { create } from '../helper'

export default async () => {
  await create(20, (prisma: PrismaClient) => {
    return prisma.comment.create({
      data: {
        content: Random.cparagraph(10, 30),
        userId: Random.integer(1, 10),
        topicId: Random.integer(1, 20),
      },
    })
  })

  await create(20, (prisma: PrismaClient) => {
    return prisma.comment.create({
      data: {
        content: Random.cparagraph(10, 30),
        userId: Random.integer(1, 10),
        videoId: Random.integer(1, 20),
      },
    })
  })
}
