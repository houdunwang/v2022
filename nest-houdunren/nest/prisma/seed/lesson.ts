import { PrismaClient } from '@prisma/client'
import { Random } from 'mockjs'
import { create } from '../helper'
export default () => {
  create(20, async (prisma: PrismaClient) => {
    await prisma.lesson.create({
      data: {
        title: Random.ctitle(),
        price: Random.integer(0, 100),
        click: Random.integer(10, 1000),
        description: Random.cparagraph(),
        preview: Random.image('300x300'),
        status: Boolean(Random.integer(0, 1)),
      },
    })
  })
}
