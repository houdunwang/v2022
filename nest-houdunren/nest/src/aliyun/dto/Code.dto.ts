import { IsMobilePhone, IsNotEmpty } from 'class-validator'

export class CodeDto {
  @IsNotEmpty({ message: '手机号不能空' })
  @IsMobilePhone('zh-CN', {}, { message: '手机号格式错误' })
  mobile: string
}
