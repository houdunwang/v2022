import config from '../config'
import canvasAbstract from './canvasAbstract'
import model from '../model/water'
class water extends canvasAbstract implements ICanvas {
  num(): number {
    return config.water.num
  }
  model(): ModelConstructor {
    return model
  }

  render(): void {
    super.createModels()
    super.renderModels()
  }
}

export default new water()
