import {
  Body,
  Controller,
  Get,
  Param,
  ParseIntPipe,
  Post,
  UsePipes,
} from '@nestjs/common';
import { PrismaClient } from '@prisma/client';
import { AppService } from './app.service';
import CreateArticleDto from './dto/create.article.dto';
import { HdPipe } from './hd.pipe';

@Controller()
export class AppController {
  prisma: PrismaClient;
  constructor(private readonly appService: AppService) {
    this.prisma = new PrismaClient();
  }

  @Get()
  getHello(@Param('id', ParseIntPipe) id: number) {
    return this.prisma.article.findUnique({
      where: {
        id,
      },
    });
  }

  @Post('store')
  async add(@Body() dto: CreateArticleDto) {
    const article = await this.prisma.article.create({
      data: {
        title: dto.title,
        content: dto.content,
      },
    });
    console.log(article);
  }
}
