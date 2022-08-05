import { ConfigType } from './types/config'
import { Inject, Injectable } from '@nestjs/common'

@Injectable()
export class AppService {
  constructor(
    @Inject('ConfigService')
    private configService: ConfigType,
  ) {}
  get() {
    return 'AppService get method' + `[${this.configService.url}]`
  }
}
