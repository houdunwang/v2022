import { Injectable } from '@nestjs/common'

@Injectable()
export class TestService {
  get() {
    return 'test service get method'
  }
}
