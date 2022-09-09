import { AuthService } from './auth.service'
import { RegisterDto } from './dto/register.dto'
import { Body } from '@nestjs/common'
import { Post } from '@nestjs/common'
import { Controller } from '@nestjs/common'

@Controller('auth')
export class AuthController {
  constructor(private authService: AuthService) {}
  @Post('register')
  register(@Body() dto: RegisterDto) {
    return this.authService.register(dto)
  }
}
