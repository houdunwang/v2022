import { HttpException, HttpStatus, ValidationError, ValidationPipe } from '@nestjs/common'

export default class ValidatePipe extends ValidationPipe {
  protected flattenValidationErrors(validationErrors: ValidationError[]): string[] {
    const messages = validationErrors.map((error) => {
      return { field: error.property, message: Object.values(error.constraints)[0] }
    })

    throw new HttpException(
      {
        code: HttpStatus.BAD_REQUEST,
        messages,
        error: 'bad request',
      },
      HttpStatus.BAD_REQUEST,
    )
  }
}
