import { ConfigService } from '@nestjs/config'
import { success } from './../helper'
import { CodeDto } from './dto/Code.dto'
import { CodeService } from './code.service'
import { Controller } from '@nestjs/common'
import { Post } from '@nestjs/common'
import { Body } from '@nestjs/common'

@Controller('code')
export class CodeController {
  constructor(private codeService: CodeService, private config: ConfigService) {}
  @Post('send')
  async send(@Body() dto: CodeDto) {
    const code = await this.codeService.code(dto.mobile)
    return success('验证码发送成功', this.config.get('app.is_dev') ? code : '')
  }
}
