import { applyDecorators, MethodNotAllowedException, UseInterceptors } from '@nestjs/common'
import { FileInterceptor } from '@nestjs/platform-express'
import { MulterOptions } from '@nestjs/platform-express/multer/interfaces/multer-options.interface'

export function fileFilter(type: string[]) {
  return (req: any, file: Express.Multer.File, callback: (error: Error | null, acceptFile: boolean) => void) => {
    const check = type.some((t) => file.mimetype.includes(t))
    if (!check) {
      callback(new MethodNotAllowedException('文件类型错误'), false)
    } else {
      callback(null, true)
    }
  }
}

export function Upload(field = 'file', options: MulterOptions) {
  return applyDecorators(UseInterceptors(FileInterceptor(field, options)))
}

export function ImageUpload(field = 'file') {
  return Upload(field, {
    limits: { fieldSize: Math.pow(1024, 2) * 3 },
    fileFilter: fileFilter(['image']),
  })
}

export function MarkdownUpload(field = 'file') {
  return Upload(field, {
    limits: { fieldSize: Math.pow(1024, 2) * 3 },
    fileFilter: fileFilter(['markdown']),
  })
}

export function UploadFile(field = 'file', type: string[] = ['image']) {
  return Upload(field, {
    limits: { fieldSize: Math.pow(1024, 2) * 3 },
    fileFilter: fileFilter(type),
  })
}
