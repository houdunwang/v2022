import { Transform, Type } from 'class-transformer'
import { IsInt, IsNotEmpty, IsString, Length, ValidateIf } from 'class-validator'

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
}
