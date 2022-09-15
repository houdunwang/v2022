import { success } from './../helper'
import { Body, Controller, Delete, Get, Param, Post } from '@nestjs/common'
import { CommentService } from './comment.service'
import { CreateCommentDto } from './dto/create-comment.dto'

@Controller('comment')
export class CommentController {
  constructor(private readonly commentService: CommentService) {}

  @Post()
  create(@Body() createCommentDto: CreateCommentDto) {
    return this.commentService.create(createCommentDto)
  }

  @Get()
  findAll() {
    return this.commentService.findAll()
  }

  @Delete(':id')
  async remove(@Param('id') id: string) {
    await this.commentService.remove(+id)
    return success('评论删除成功')
  }
}
