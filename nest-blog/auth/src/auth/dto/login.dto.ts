import { PartialType } from '@nestjs/mapped-types';
import RegisterDto from './register.dto';

export default class LoginDto extends PartialType(RegisterDto) {}
