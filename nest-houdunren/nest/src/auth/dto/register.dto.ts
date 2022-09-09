import { IsConfirmRule } from '@/validate/is-confirm.rule'
import { IsNotExistsRule } from '@/validate/is-not-exists.rule'
import { IsMobilePhone, IsNotEmpty, Length } from 'class-validator'

export class RegisterDto {
  @IsMobilePhone('zh-CN', {}, { message: '手机号输入错误' })
  @IsNotExistsRule('user', { message: '手机号已经注册' })
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
