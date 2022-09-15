import { Type } from 'class-transformer'
import { IsNotEmpty, IsOptional } from 'class-validator'

export class CreateCommentDto {
  @IsNotEmpty({ message: '评论内容不能为空' })
  content: string

  @Type(() => Number)
  userId: number

  @IsOptional()
  @Type(() => Number)
  topicId: number

  @IsOptional()
  @Type(() => Number)
  videoId: number
}
