import { Injectable } from '@nestjs/common'
import { PrismaClient } from '@prisma/client'

@Injectable()
export class PrismaService extends PrismaClient {
  constructor() {
    super(process.env.NODE_ENV === 'development' ? { log: ['query'] } : {})
  }
}
