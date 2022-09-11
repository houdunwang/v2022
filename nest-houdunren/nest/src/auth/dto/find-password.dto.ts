import { IsConfirmRule } from '@/validate/is-confirm.rule'
import { IsExistsRule } from '@/validate/is-exists.rule'
import { IsMobilePhone, IsNotEmpty, Length } from 'class-validator'

export class FindPasswordDto {
  @IsMobilePhone('zh-CN', {}, { message: '手机号输入错误' })
  @IsExistsRule('user', { message: '手机号不存在' })
  mobile: string

  @IsNotEmpty({ message: '密码不能为空' })
  @Length(5, 20, { message: '请输入5~20位的密码' })
  @IsConfirmRule({ message: '两次密码不一致' })
  password: string

  @IsNotEmpty({ message: '确认密码不能为空' })
  password_confirm: string

  @IsNotEmpty({ message: '验证码不能为空' })
  code: string
}
