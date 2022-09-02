import { IsNotEmpty } from 'class-validator';
import { IsConfirm } from '@/common/rules/is-confirm.rule';
import { IsNotExistsRule } from '@/common/rules/is-not-exists.rule';

export default class RegisterDto {
  @IsNotEmpty({ message: '用户名不能为空' })
  @IsNotExistsRule('user', { message: '用户已经注册' })
  name: string;
  @IsNotEmpty({ message: '密码不能为空' })
  @IsConfirm({ message: '两次密码不一致' })
  password: string;
  @IsNotEmpty({ message: '确认密码不能为空' })
  password_confirm: string;
}
