import { Type } from 'class-transformer'
import { IsNotEmpty } from 'class-validator'

export class CreateReplyDto {
  @IsNotEmpty({ message: '回复内容不能为空' })
  content: string
  @Type(() => Number)
  commentId: number
}
