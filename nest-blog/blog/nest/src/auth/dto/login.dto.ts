import { IsNotEmpty } from 'class-validator';
import { IsExistsRule } from '@/common/rules/is-exists.rule';

export default class LoginDto {
  @IsNotEmpty({ message: '用户名不能为空' })
  @IsExistsRule('user', { message: '帐号不存在' })
  name: string;
  @IsNotEmpty({ message: '密码不能为空' })
  password: string;
}
