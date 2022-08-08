import { PrismaClient } from '@prisma/client'
const prisma = new PrismaClient()

export async function create(count = 1, callback: (prisma: PrismaClient) => Promise<void>) {
  for (let i = 0; i < count; i++) {
    await callback(prisma)
  }
}
