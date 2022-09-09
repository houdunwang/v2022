import { CodeService } from './../aliyun/code.service'
import { RegisterDto } from './dto/register.dto'
import { Injectable } from '@nestjs/common'

@Injectable()
export class AuthService {
  constructor(private codeService: CodeService) {}
  register(dto: RegisterDto) {
    //校验验证码
    this.codeService.check(dto)
  }
}
