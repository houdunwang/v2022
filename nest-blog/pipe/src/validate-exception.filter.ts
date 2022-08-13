import {
  ArgumentsHost,
  BadRequestException,
  Catch,
  ExceptionFilter,
  HttpStatus,
} from '@nestjs/common';

@Catch()
export class ValidateExceptionFilter<T> implements ExceptionFilter {
  catch(exception: T, host: ArgumentsHost) {
    const ctx = host.switchToHttp();
    const response = ctx.getResponse();

    if (exception instanceof BadRequestException) {
      const responseObject = exception.getResponse() as any;

      return response.status(HttpStatus.UNPROCESSABLE_ENTITY).json({
        code: HttpStatus.UNPROCESSABLE_ENTITY,
        message: responseObject.message.map((error) => {
          const info = error.split('-');
          return { field: info[0], message: info[1] };
        }),
      });
    }

    return response;
  }
}
