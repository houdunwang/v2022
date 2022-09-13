import { IsNotEmpty } from 'class-validator'

export class CreateTopicDto {
  @IsNotEmpty({ message: '标题不能为空' })
  title: string

  @IsNotEmpty({ message: '贴子内容不能为空' })
  content: string
}
