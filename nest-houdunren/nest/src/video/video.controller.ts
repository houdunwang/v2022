import { Controller, DefaultValuePipe, Get, Query } from '@nestjs/common'
import { VideoService } from './video.service'

@Controller('video')
export class VideoController {
  constructor(private readonly videoService: VideoService) {}

  @Get()
  findAll(@Query('page', new DefaultValuePipe(1)) page: number) {
    return this.videoService.findAll(page)
  }
}
