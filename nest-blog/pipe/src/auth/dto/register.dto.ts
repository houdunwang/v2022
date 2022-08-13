import { IsNotEmpty, Validate } from 'class-validator';
import { IsConfirmed } from 'src/rules/is-confirmed.rule';
import { IsNotExistsRule } from 'src/rules/is-not-exists.rule';

export default class RegisterDto {
  @IsNotEmpty({ message: '用户名不能为空' })
  @IsNotExistsRule('user', { message: '用户已经存在' })
  name: string;

  @IsNotEmpty({ message: '密码不能为空' })
  @Validate(IsConfirmed, { message: '确认密码输入错误' })
  password: string;
}
