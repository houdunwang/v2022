import { PrismaService } from '@/prisma/prisma.service'
import { Injectable } from '@nestjs/common'
import { CreateSystemDto } from './dto/create-system.dto'
import { UpdateSystemDto } from './dto/update-system.dto'

@Injectable()
export class SystemService {
  constructor(private readonly prisma: PrismaService) {}
  create(createSystemDto: CreateSystemDto) {
    return this.prisma.system.create({
      data: createSystemDto,
    })
  }

  findAll() {
    return this.prisma.system.findMany()
  }

  findOne(id: number) {
    return this.prisma.system.findFirst({
      where: { id },
      include: { lessons: { select: { id: true, title: true } } },
    })
  }

  update(id: number, updateSystemDto: UpdateSystemDto) {
    return this.prisma.system.update({
      where: { id },
      data: updateSystemDto,
    })
  }

  remove(id: number) {
    return this.prisma.system.delete({ where: { id } })
  }
}
