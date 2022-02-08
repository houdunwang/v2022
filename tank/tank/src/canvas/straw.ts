import config from '../config'
import canvasAbstract from './canvasAbstract'
import strawModel from '../model/straw'
class straw extends canvasAbstract {
  render(): void {
    super.renderModel(config.straw.num, strawModel)
  }
}

export default new straw()
