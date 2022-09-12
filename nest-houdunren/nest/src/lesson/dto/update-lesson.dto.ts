import { PartialType } from '@nestjs/mapped-types'
import { Type } from 'class-transformer'
import { CreateLessonDto } from './create-lesson.dto'

export class UpdateLessonDto extends PartialType(CreateLessonDto) {
  @Type(() => Number)
  id: number
}
