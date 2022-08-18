import { IsNotEmpty } from 'class-validator';

export default class RegisterDto {
  @IsNotEmpty({ message: '用户名不能为空' })
  name: string;
  @IsNotEmpty()
  password: string;
}
