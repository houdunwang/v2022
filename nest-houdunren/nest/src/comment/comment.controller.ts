import { success } from './../helper'
import { Body, Controller, Delete, Get, Param, Post, Query } from '@nestjs/common'
import { CommentService } from './comment.service'
import { CreateCommentDto } from './dto/create-comment.dto'
import { Auth } from '@/auth/decorator/auth.decorator'
import { CurrentUser } from '@/auth/decorator/user.decorator'
import { User } from '@prisma/client'

@Controller('comment')
export class CommentController {
  constructor(private readonly commentService: CommentService) {}

  @Post()
  @Auth()
  create(@Body() createCommentDto: CreateCommentDto, @CurrentUser() user: User) {
    return this.commentService.create(createCommentDto, user)
  }

  @Get()
  findAll(@Query('topicId') topicId: number, @Query('videoId') videoId: number) {
    return this.commentService.findAll(topicId, videoId)
  }

  @Delete(':id')
  async remove(@Param('id') id: string) {
    await this.commentService.remove(+id)
    return success('评论删除成功')
  }
}
