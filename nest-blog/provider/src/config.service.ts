import { productionConfig } from './config/production.config'
import { developmentConfig } from './config/development.config'
import path from 'node:path'
import dotenv from 'dotenv'
dotenv.config({ path: path.join(__dirname, '../.env') })

export const ConfigService = {
  provide: 'ConfigService',
  useValue: process.env.NODE_ENV === 'development' ? developmentConfig : productionConfig,
}
