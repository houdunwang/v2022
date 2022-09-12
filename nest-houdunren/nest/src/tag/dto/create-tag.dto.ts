import { IsNotExistsRule } from '@/validate/is-not-exists.rule'
import { IsNotEmpty } from 'class-validator'

export class CreateTagDto {
  @IsNotEmpty({ message: '标签名不能为空' })
  @IsNotExistsRule('Tag', { message: '标签已经存在' })
  title: string
}
