import { Type } from 'class-transformer'
import { IsInt, IsNotEmpty, IsOptional, IsString, Length, ValidateIf } from 'class-validator'

export class CreateLessonDto {
  @IsNotEmpty()
  @Length(5, 100)
  title: string

  @IsNotEmpty()
  description: string

  @Type(() => Number)
  @IsNotEmpty()
  @IsInt()
  price: number

  @IsString()
  preview: string

  @ValidateIf((o) => o.download)
  @IsString()
  download: string

  @Type(() => Boolean)
  status: boolean

  @ValidateIf((o) => o.systemId)
  @Type(() => Number)
  @IsInt()
  systemId: number

  @ValidateIf((o) => o.tagId)
  @Type(() => Number)
  tagId: number[]

  @IsOptional()
  videos: { title: string; path: string; id?: number }[]
}
