import { Controller, Post, UploadedFile, UseInterceptors } from '@nestjs/common'
import { TransformInterceptor } from 'src/TransformInterceptor'
import { ImageUpload, UploadFile } from './decorator/upload.decorator'

@Controller('upload')
@UseInterceptors(new TransformInterceptor())
export class UploadController {
  @Post('image')
  //   @UseInterceptors(
  //     FileInterceptor('file', {
  //       limits: { fileSize: Math.pow(1024, 2) * 2 },
  //       fileFilter(req: any, file: Express.Multer.File, callback: (error: Error | null, acceptFile: boolean) => void) {
  //         if (!file.mimetype.includes('image')) {
  //           callback(new MethodNotAllowedException('文件类型错误'), false)
  //         } else {
  //           callback(null, true)
  //         }
  //       },
  //     }),
  //   )
  //   @Upload('file', {
  //     limits: { fileSize: Math.pow(1024, 2) * 2 },
  //     fileFilter: fileFilter('image'),
  //   })
  @ImageUpload()
  image(@UploadedFile() file: Express.Multer.File) {
    return file
  }

  @Post('document')
  @UploadFile('file', ['image', 'markdown'])
  document(@UploadedFile() file: Express.Multer.File) {
    return file
  }
}
