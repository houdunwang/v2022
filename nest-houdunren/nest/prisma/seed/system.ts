import { PrismaClient } from '@prisma/client'
import { Random } from 'mockjs'
import { create } from '../helper'

export default async () => {
  await create(5, async (prisma: PrismaClient) => {
    await prisma.system.create({
      data: {
        title: Random.ctitle(),
        description: Random.cparagraph(3, 10),
        preview: Random.image('300x300'),
      },
    })
  })
}
