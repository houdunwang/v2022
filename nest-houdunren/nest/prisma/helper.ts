import { PrismaClient } from '@prisma/client'
const prisma = new PrismaClient()
export const create = (count = 1, callback: (prisma: PrismaClient) => void) => {
  for (let i = 1; i <= count; i++) {
    callback(prisma)
  }
}
