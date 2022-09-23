import { url } from '@/helper'
import { HttpException, HttpStatus, Injectable } from '@nestjs/common'
import { JwtService } from '@nestjs/jwt'
import { User } from '@prisma/client'
import { hash } from 'argon2'
import { CodeService } from './../aliyun/code.service'
import { PrismaService } from './../prisma/prisma.service'
import { FindPasswordDto } from './dto/find-password.dto'
import { LoginDto } from './dto/login.dto'
import { RegisterDto } from './dto/register.dto'
import { ResetPasswordDto } from './dto/reset-password.dto'

@Injectable()
export class AuthService {
  constructor(private codeService: CodeService, private prisma: PrismaService, private jwt: JwtService) {}
  async register(dto: RegisterDto) {
    //校验验证码
    await this.codeService.check(dto)
    const user = await this.prisma.user.create({
      data: {
        mobile: dto.mobile,
        avatar: url('assets/user/文件14.jpg'),
        name: '盾友',
        password: await hash(dto.password),
      },
    })

    return this.token(user)
  }

  async login(dto: LoginDto) {
    const user = await this.prisma.user.findUnique({
      where: { mobile: dto.mobile },
    })

    return this.token(user)
  }

  async findPassword(dto: FindPasswordDto) {
    await this.codeService.check(dto)

    const user = await this.prisma.user.update({
      where: { mobile: dto.mobile },
      data: { password: await hash(dto.password) },
    })

    if (!user) new HttpException({ mobile: '帐号不存在' }, HttpStatus.BAD_REQUEST)

    return this.token(user)
  }
  async token({ id }) {
    return {
      token: await this.jwt.signAsync({
        id,
      }),
    }
  }

  async resetPassword(dto: ResetPasswordDto, user: User) {
    await this.codeService.check({ ...user, code: dto.code })
    return this.prisma.user.update({
      where: { id: user.id },
      data: {
        password: await hash(dto.password),
      },
    })
  }
}
