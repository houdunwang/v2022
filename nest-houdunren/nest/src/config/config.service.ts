import { uploadConfig } from './data/upload'
import { Inject, Injectable } from '@nestjs/common'
import { ConfigType } from '@nestjs/config'
import { aliyuConfig } from './data/aliyun'

@Injectable()
export class ConfigService {
  constructor(
    @Inject(aliyuConfig.KEY) public aliyun: ConfigType<typeof aliyuConfig>,
    @Inject(uploadConfig.KEY) public upload: ConfigType<typeof uploadConfig>,
  ) {}
}
