import { Controller, Get, Post, Body, Patch, Param, Delete } from '@nestjs/common'
import { SystemService } from './system.service'
import { CreateSystemDto } from './dto/create-system.dto'
import { UpdateSystemDto } from './dto/update-system.dto'

@Controller('system')
export class SystemController {
  constructor(private readonly systemService: SystemService) {}

  @Post()
  create(@Body() createSystemDto: CreateSystemDto) {
    return this.systemService.create(createSystemDto)
  }

  @Get()
  findAll() {
    return this.systemService.findAll()
  }

  @Get(':id')
  findOne(@Param('id') id: string) {
    return this.systemService.findOne(+id)
  }

  @Patch(':id')
  update(@Param('id') id: string, @Body() updateSystemDto: UpdateSystemDto) {
    return this.systemService.update(+id, updateSystemDto)
  }

  @Delete(':id')
  remove(@Param('id') id: string) {
    return this.systemService.remove(+id)
  }
}
