import { PrismaClient } from '@prisma/client'
import { Random } from 'mockjs'
import { create } from '../helper'
export default async () => {
  await create(15, async (prisma: PrismaClient) => {
    return prisma.lesson.create({
      data: {
        title: Random.ctitle(),
        price: Random.integer(0, 100),
        click: Random.integer(10, 1000),
        description: Random.cparagraph(),
        preview: `http://localhost:3000/assets/lesson/文件${Random.integer(1, 37)}.jpg`,
        status: Boolean(Random.integer(0, 1)),
        systemId: Random.integer(1, 5),
        LessonTag: {
          create: { tagId: Random.integer(1, 6) },
        },
      },
    })
  })
}
