import { Inject, Injectable } from '@nestjs/common'
import { User } from '@prisma/client'
import { PrismaService } from '../prisma/prisma.service'
import { CreateReplyDto } from './dto/create-reply.dto'
@Injectable()
export class ReplyService {
  @Inject()
  private readonly prisma: PrismaService

  create(dto: CreateReplyDto, user: User) {
    return this.prisma.reply.create({
      data: { ...dto, userId: user.id },
    })
  }
}
