import {
  ArgumentMetadata,
  HttpException,
  HttpStatus,
  Injectable,
  PipeTransform,
} from '@nestjs/common';
import { plainToInstance } from 'class-transformer';
import { validate } from 'class-validator';

@Injectable()
export class HdPipe implements PipeTransform {
  async transform(value: any, metadata: ArgumentMetadata) {
    const object = plainToInstance(metadata.metatype, value);
    const errors = await validate(object);

    if (errors.length) {
      const messages = errors.map((error) => ({
        filed: error.property,
        message: Object.values(error.constraints).map((v) => v),
      }));
      throw new HttpException(messages, HttpStatus.UNPROCESSABLE_ENTITY);
    }
    return value;
  }
}
