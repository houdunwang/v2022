import { IsNotEmpty, IsUrl, Length } from 'class-validator'

export class CreateSystemDto {
  @IsNotEmpty({ message: '课程标题不能为空' })
  @Length(5, 20, { message: '标题长度为5～20' })
  title: string

  @IsNotEmpty({ message: '请输入课程介绍' })
  @Length(10, 100, { message: '内容为10～100字 ' })
  description: string

  @IsNotEmpty({ message: '请设置课程预览图' })
  @IsUrl({}, { message: '图片必须为url' })
  preview: string
}
