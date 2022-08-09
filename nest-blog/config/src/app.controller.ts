import { Controller, Get, Inject } from '@nestjs/common';
import { AppService } from './app.service';
import { ConfigService, ConfigType } from '@nestjs/config';
import databaseConfig from './config/database.config';

@Controller()
export class AppController {
  constructor(
    private readonly appService: AppService,
    private readonly config: ConfigService,
    @Inject(databaseConfig.KEY)
    private database: ConfigType<typeof databaseConfig>,
  ) {}

  @Get()
  getHello(): any {
    // type getType<T extends () => any> = T extends () => infer U ? U : T;
    // type f = typeof databaseConfig;
    // type databaseType = getType<typeof databaseConfig>;
    return this.database.password;
    // this.config.get('upload.')
    // return this.config.get('upload');
    // return process.env.APP_NAME;
    // console.log();
    // return this.config.get('ALIYUN_SECRET');
    // return this.appService.getHello();
  }
}
