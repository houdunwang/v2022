import { PrismaClient } from '@prisma/client'
import { Random } from 'mockjs'
import { create } from '../helper'

export default async () => {
  await create(9, async (prisma: PrismaClient) => {
    await prisma.system.create({
      data: {
        title: Random.ctitle(),
        description: Random.cparagraph(3, 10),
        preview: `http://localhost:3000/assets/system/文件${Random.integer(1, 10)}.png`,
      },
    })
  })
}
