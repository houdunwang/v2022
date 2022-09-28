import { Inject, Injectable } from '@nestjs/common'
import { User } from '@prisma/client'
import { PrismaService } from './../prisma/prisma.service'
import { CreateCommentDto } from './dto/create-comment.dto'
@Injectable()
export class CommentService {
  @Inject()
  private readonly prisma: PrismaService

  create(createCommentDto: CreateCommentDto, user: User) {
    return this.prisma.comment.create({
      data: { ...createCommentDto, userId: user.id },
    })
  }

  findAll(topicId: number, videoId: number) {
    return this.prisma.comment.findMany({
      where: {
        ...(topicId ? { topicId } : {}),
        ...(videoId ? { videoId } : {}),
      },
      include: {
        User: { select: { id: true, name: true, avatar: true } },
        Reply: {
          include: { user: { select: { id: true, name: true, avatar: true } } },
        },
      },
    })
  }

  remove(id: number) {
    return this.prisma.comment.delete({ where: { id } })
  }
}
