import config from '../config'
import canvasAbstract from './canvasAbstract'
import model from '../model/steel'
class steel extends canvasAbstract implements ICanvas {
  constructor() {
    super()
  }

  render(): void {
    super.createModels()
    super.renderModels()
  }
  num(): number {
    return config.steel.num
  }
  model(): ModelConstructor {
    return model
  }
}

export default new steel()
