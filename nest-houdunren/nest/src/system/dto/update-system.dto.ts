import { PartialType } from '@nestjs/mapped-types';
import { CreateSystemDto } from './create-system.dto';

export class UpdateSystemDto extends PartialType(CreateSystemDto) {}
