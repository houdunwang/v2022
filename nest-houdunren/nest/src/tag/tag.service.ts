import { PrismaService } from '@/prisma/prisma.service'
import { Injectable } from '@nestjs/common'
import { CreateTagDto } from './dto/create-tag.dto'
import { UpdateTagDto } from './dto/update-tag.dto'

@Injectable()
export class TagService {
  constructor(private readonly prisma: PrismaService) {}
  create(createTagDto: CreateTagDto) {
    return this.prisma.tag.create({
      data: { title: createTagDto.title },
    })
  }

  findAll() {
    return this.prisma.tag.findMany()
  }

  findOne(id: number) {
    return this.prisma.tag.findUnique({
      where: { id },
    })
  }

  update(id: number, updateTagDto: UpdateTagDto) {
    return this.prisma.tag.update({
      where: { id },
      data: updateTagDto,
    })
  }

  remove(id: number) {
    return this.prisma.tag.delete({ where: { id } })
  }
}
