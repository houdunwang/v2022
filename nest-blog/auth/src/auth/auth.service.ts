import { PrismaService } from './../prisma/prisma.service';
import { BadRequestException, Injectable } from '@nestjs/common';
import RegisterDto from './dto/register.dto';
import { hash, verify } from 'argon2';
import LoginDto from './dto/login.dto';

@Injectable()
export class AuthService {
  constructor(private prisma: PrismaService) {}
  async register(dto: RegisterDto) {
    const password = await hash(dto.password);
    const user = await this.prisma.user.create({
      data: {
        name: dto.name,
        password,
      },
    });

    delete user.password;
    return user;
  }

  async login(dto: LoginDto) {
    const user = await this.prisma.user.findFirst({
      where: {
        name: dto.name,
      },
    });

    //校对密码
    if (!(await verify(user.password, dto.password))) {
      throw new BadRequestException('密码输入错误');
    }

    delete user.password;
    return user;
  }
}
