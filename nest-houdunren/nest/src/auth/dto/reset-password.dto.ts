import { IsConfirmRule } from '@/validate/is-confirm.rule'
import { IsNotEmpty, Length } from 'class-validator'

export class ResetPasswordDto {
  @IsNotEmpty({ message: '密码不能为空' })
  @Length(5, 20, { message: '请输入5~20位的密码' })
  @IsConfirmRule({ message: '两次密码不一致' })
  password: string

  @IsNotEmpty({ message: '确认密码不能为空' })
  password_confirm: string

  @IsNotEmpty({ message: '验证码不能为空' })
  code: string
}
