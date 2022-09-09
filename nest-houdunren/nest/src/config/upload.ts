import { registerAs } from '@nestjs/config'

export const upload = registerAs('upload', () => {
  return {
    size: 1000,
  }
})
