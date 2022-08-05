import { Injectable } from '@nestjs/common'

@Injectable()
export class DbService {
  constructor(private readonly options: Record<string, any>) {}
  public connect() {
    return `<h1 style="background:red">连接数据库 -主机： ${this.options.url}</h1>`
  }
}
