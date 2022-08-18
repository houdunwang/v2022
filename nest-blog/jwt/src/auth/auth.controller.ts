import { Body, Controller, Get, Post } from '@nestjs/common'
import { AuthService } from './auth.service'
import { Auth } from './decorator/auth.decorator'
import LoginDto from './dto/login.dto'
import RegisterDto from './dto/register.dto'

@Controller('auth')
export class AuthController {
  constructor(private auth: AuthService) {}
  @Post('register')
  register(@Body() dto: RegisterDto) {
    return this.auth.register(dto)
  }
  @Post('login')
  login(@Body() dto: LoginDto) {
    return this.auth.login(dto)
  }

  @Get('all')
  @Auth()
  all() {
    return this.auth.findAll()
  }
}
