import { NestFactory } from '@nestjs/core';
import { AppModule } from './app.module';
import { HdPipe } from './hd.pipe';

async function bootstrap() {
  const app = await NestFactory.create(AppModule);
  // app.useGlobalPipes(new HdPipe());
  await app.listen(3000);
}
bootstrap();
