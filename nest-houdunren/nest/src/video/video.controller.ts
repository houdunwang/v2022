import { Auth } from '@/auth/decorator/auth.decorator'
import { Controller, DefaultValuePipe, Get, Param, ParseIntPipe, Query } from '@nestjs/common'
import { VideoService } from './video.service'

@Controller('video')
export class VideoController {
  constructor(private readonly videoService: VideoService) {}

  @Get()
  findAll(@Query('page', new DefaultValuePipe(1)) page: number) {
    return this.videoService.findAll(page)
  }

  @Get(':id')
  @Auth()
  findOne(@Param('id', ParseIntPipe) id: number) {
    return this.videoService.findOne(+id)
  }
}
