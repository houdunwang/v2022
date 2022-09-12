import { PrismaClient } from '@prisma/client'
import { hash } from 'argon2'
import { Random } from 'mockjs'
import { create } from '../helper'
const prisma = new PrismaClient()
export default async () => {
  await prisma.user.create({
    data: {
      mobile: process.env.MOBILE,
      password: await hash('admin888'),
    },
  })
  create(10, async (prisma: PrismaClient) => {
    return prisma.user.create({
      data: {
        mobile: String(Random.integer(11111111111, 19999999999)),
        password: await hash('admin888'),
        avatar: Random.image('300x300'),
        github: Random.url(),
      },
    })
  })
}
