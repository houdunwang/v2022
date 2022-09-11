import { FindPasswordDto } from './dto/find-password.dto'
import { Body, Controller, Post, Req, UseGuards } from '@nestjs/common'
import { AuthService } from './auth.service'
import { LoginDto } from './dto/login.dto'
import { RegisterDto } from './dto/register.dto'
import { ResetPasswordDto } from './dto/reset-password.dto'
import { AuthGuard } from '@nestjs/passport'
import { Request } from 'express'
import { User } from './decorator/user.decorator'
import { User as UserModel } from '@prisma/client'
import { Auth } from './decorator/auth.decorator'

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
  resetPassword(@Body() dto: ResetPasswordDto, @User() user: UserModel) {
    return this.authService.resetPassword(dto, user)
  }
}
