import { article } from '@prisma/client'
import { Transform } from 'class-transformer'
import dayjs from 'dayjs'
export class Article {
  @Transform(({ value }) => dayjs(value).format('YYYY-MM-DD'))
  createdAt: string
  @Transform(({ value }) => dayjs(value).format('YYYY-MM-DD'))
  updatedAt: string
  constructor(options: Partial<article>) {
    Object.assign(this, options)
  }
}
