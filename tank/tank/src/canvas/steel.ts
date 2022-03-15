import config from '../config'
import canvasAbstract from './canvasAbstract'
import model from '../model/steel'
export default new (class extends canvasAbstract implements ICanvas {
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
})('sleet')
