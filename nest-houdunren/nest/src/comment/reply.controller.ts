import { ReplyService } from './reply.service'
import { CreateReplyDto } from './dto/create-reply.dto'
import { success } from '../helper'
import { Body, Controller, Delete, Get, Param, Post, Query } from '@nestjs/common'
import { CommentService } from './comment.service'
import { CreateCommentDto } from './dto/create-comment.dto'
import { Auth } from '@/auth/decorator/auth.decorator'
import { CurrentUser } from '@/auth/decorator/user.decorator'
import { User } from '@prisma/client'

@Controller('reply')
export class ReplyController {
  constructor(private readonly replyService: ReplyService) {}

  @Post()
  @Auth()
  create(@Body() dto: CreateReplyDto, @CurrentUser() user: User) {
    return this.replyService.create(dto, user)
  }
}
