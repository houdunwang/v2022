import { registerAs } from '@nestjs/config'

export const uploadConfig = registerAs('upload', () => {
  return {
    size: 1000,
  }
})
