export class BaseController {
  success(message: string, data: any = {}, code = 0) {
    return { message, data, code }
  }
}
