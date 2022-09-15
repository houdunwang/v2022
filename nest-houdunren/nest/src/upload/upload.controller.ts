import { Controller, Post, UploadedFile } from '@nestjs/common'
import { Image } from './upload'

@Controller('upload')
export class UploadController {
  @Post('image')
  @Image()
  image(@UploadedFile() file: Express.Multer.File) {
    return file
  }
}
