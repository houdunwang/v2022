import { PrismaClient } from '@prisma/client'
import { hash } from 'argon2'
import { Random } from 'mockjs'
import { create } from '../helper'
const prisma = new PrismaClient()
export default async () => {
  await prisma.user.create({
    data: {
      mobile: process.env.MOBILE,
      name: '向军大叔',
      password: await hash('admin888'),
      avatar: 'http://localhost:3000/assets/xj.jpg',
    },
  })
  await create(10, async (prisma: PrismaClient) => {
    return prisma.user.create({
      data: {
        mobile: String(Random.integer(11111111111, 19999999999)),
        name: Random.cname(),
        password: await hash('admin888'),
        avatar: `http://localhost:3000/assets/user/文件${Random.integer(1, 20)}.jpg`,
        github: Random.url(),
      },
    })
  })
}
