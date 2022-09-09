import { PrismaClient } from '@prisma/client'
import { hash } from 'argon2'
const prisma = new PrismaClient()
async function run() {
  await prisma.user.create({
    data: {
      mobile: '19999999999',
      password: await hash('admin888'),
    },
  })
}

run()
