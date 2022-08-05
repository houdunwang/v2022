import { Inject, Injectable, Optional } from '@nestjs/common'
import { readdirSync } from 'fs'
import path from 'path'

@Injectable()
export class ConfigService {
  constructor(@Inject('CONFIG_OPTIONS') options: { path: string }, @Optional() private config = {}) {
    readdirSync(options.path).map(async (file) => {
      if (file.slice(-2) === 'js') {
        const module = await import(path.resolve(options.path, file))
        this.config = { ...this.config, ...module.default() }
      }
    })
  }
  get(path: string) {
    return path.split('.').reduce((config, name) => config[name], this.config)
  }
}
