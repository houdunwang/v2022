import { Inject, Injectable } from '@nestjs/common'
import { PrismaService } from './../prisma/prisma.service'
import { CreateCommentDto } from './dto/create-comment.dto'
@Injectable()
export class CommentService {
  @Inject()
  private readonly prisma: PrismaService

  create(createCommentDto: CreateCommentDto) {
    return this.prisma.comment.create({
      data: createCommentDto,
    })
  }

  findAll() {
    return this.prisma.comment.findMany()
  }

  remove(id: number) {
    return this.prisma.comment.delete({ where: { id } })
  }
}
