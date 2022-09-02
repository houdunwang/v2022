import { PrismaService } from '@/prisma/prisma.service';
import { Injectable } from '@nestjs/common';
import { ConfigService } from '@nestjs/config';
import { CreateArticleDto } from './dto/create-article.dto';
import { UpdateArticleDto } from './dto/update-article.dto';

@Injectable()
export class ArticleService {
  constructor(private prisma: PrismaService, private config: ConfigService) {}
  create(createArticleDto: CreateArticleDto) {
    return this.prisma.article.create({
      data: {
        title: createArticleDto.title,
        content: createArticleDto.content,
      },
    });
  }

  async findAll(page = 1) {
    const row = this.config.get('ARTICLE_PAGE_ROW');
    const articles = await this.prisma.article.findMany({
      skip: (page - 1) * row,
      take: +row,
    });

    const total = await this.prisma.article.count();
    return {
      meta: {
        current_page: page,
        page_row: row,
        total,
        total_page: Math.ceil(total / row),
      },
      data: articles,
    };
  }

  findOne(id: number) {
    return this.prisma.article.findFirst({
      where: { id },
    });
  }

  update(id: number, updateArticleDto: UpdateArticleDto) {
    return `This action updates a #${id} article`;
  }

  remove(id: number) {
    return this.prisma.article.delete({
      where: {
        id,
      },
    });
  }
}
