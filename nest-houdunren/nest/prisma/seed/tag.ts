import { PrismaClient } from '@prisma/client'
import { Random } from 'mockjs'
import { create } from '../helper'

export default async () => {
  await create(6, async (prisma: PrismaClient) => {
    return prisma.tag.create({
      data: {
        title: Random.ctitle(),
      },
    })
  })
}
