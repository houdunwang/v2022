import { IsNotEmpty, Length } from 'class-validator';

export default class CreateArticleDto {
  @IsNotEmpty({ message: '标题不能为空' })
  @Length(10, 100, { message: '标题不能少于10个字' })
  title: string;

  @IsNotEmpty({ message: '内容不能为空' })
  content: string;
}
