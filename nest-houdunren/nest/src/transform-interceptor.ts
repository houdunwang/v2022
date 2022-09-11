import { CallHandler, ExecutionContext, Injectable, Logger, NestInterceptor } from '@nestjs/common'
import { map } from 'rxjs/operators'

@Injectable()
export class TransformInterceptor implements NestInterceptor {
  intercept(context: ExecutionContext, next: CallHandler) {
    return next.handle().pipe(
      map((data) => {
        return data?.data ? data : { data }
      }),
    )
  }
}
