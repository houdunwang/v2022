import { Body, Controller, Get, Post } from '@nestjs/common'
import { User } from '@prisma/client'
import { AuthService } from './auth.service'
import { Auth } from './decorator/auth.decorator'
import { CurrentUser } from './decorator/user.decorator'
import { FindPasswordDto } from './dto/find-password.dto'
import { LoginDto } from './dto/login.dto'
import { RegisterDto } from './dto/register.dto'
import { ResetPasswordDto } from './dto/reset-password.dto'

@Controller('auth')
export class AuthController {
  constructor(private authService: AuthService) {}
  @Post('register')
  register(@Body() dto: RegisterDto) {
    return this.authService.register(dto)
  }

  @Post('login')
  login(@Body() dto: LoginDto) {
    return this.authService.login(dto)
  }

  @Post('find-password')
  findPassword(@Body() dto: FindPasswordDto) {
    return this.authService.findPassword(dto)
  }

  @Post('reset-password')
  @Auth()
  resetPassword(@Body() dto: ResetPasswordDto, @CurrentUser() user: User) {
    return this.authService.resetPassword(dto, user)
  }

  @Get('current')
  @Auth()
  currentUser(@CurrentUser() user: User) {
    return user
  }
}
