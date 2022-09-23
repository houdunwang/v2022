import { TransformInterceptor } from './transform-interceptor'
import { NestFactory } from '@nestjs/core'
import { NestExpressApplication } from '@nestjs/platform-express'
import { AppModule } from './app.module'
import ValidatePipe from './validate/validate.pipe'

async function bootstrap() {
  const app = await NestFactory.create<NestExpressApplication>(AppModule)
  app.useGlobalPipes(new ValidatePipe({ transform: true }))
  app.setGlobalPrefix('api')
  app.useGlobalInterceptors(new TransformInterceptor())
  app.useStaticAssets('uploads', { prefix: '/uploads' })
  app.useStaticAssets('assets', { prefix: '/assets' })

  await app.listen(3000)
}

bootstrap()
