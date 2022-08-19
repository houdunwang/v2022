import { CallHandler, ExecutionContext, Injectable, Logger, NestInterceptor } from '@nestjs/common'
import { Request } from 'express'
import { map } from 'rxjs/operators'

@Injectable()
export class TransformInterceptor implements NestInterceptor {
  intercept(context: ExecutionContext, next: CallHandler) {
    // console.log('拦截器前')
    // const request = context.switchToHttp().getRequest() as Request
    // const startTime = Date.now()
    return next.handle().pipe(
      map((data) => {
        // const endTime = Date.now()
        // new Logger().error(`TIME:${endTime - startTime}\tURL:${request.path}\tMETHOD:${request.method}`)
        return {
          data,
        }
      }),
    )
  }
}
