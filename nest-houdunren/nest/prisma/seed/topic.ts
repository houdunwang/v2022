import { PrismaClient } from '@prisma/client'
import { Random } from 'mockjs'
import { create } from '../helper'

export default async () => {
  await create(20, async (prisma: PrismaClient) => {
    return prisma.topic.create({
      data: {
        title: Random.ctitle(),
        content: Random.cparagraph(10, 30),
        userId: Random.integer(1, 10),
        TopicTag: {
          create: { tagId: Random.integer(1, 5) },
        },
      },
    })
  })
}
