import { Controller, Post, UploadedFile } from '@nestjs/common'
import { image } from './upload'

@Controller('upload')
export class UploadController {
  @Post('image')
  @image()
  image(@UploadedFile() file: Express.Multer.File) {
    return file
  }
}
