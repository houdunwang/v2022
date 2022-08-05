import { Injectable } from '@nestjs/common'

@Injectable()
export class DevService {
  get() {
    return 'DevService method'
  }
}
