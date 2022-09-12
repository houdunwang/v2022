import { PrismaClient } from '@prisma/client'
const prisma = new PrismaClient()
export const create = async (count = 1, callback: (prisma: PrismaClient) => Promise<any>) => {
  for (let i = 1; i <= count; i++) {
    await callback(prisma)
  }
}
