import canvasAbstract from './canvasAbstract'
import model from '../model/play'
import config from '../config'
export default new (class extends canvasAbstract implements ICanvas {
  num(): number {
    return 0
  }
  model(): ModelConstructor {
    return model
  }

  render(): void {
    this.createModels()
    super.renderModels()
  }

  //生成模型实例
  protected createModels() {
    const x = config.canvas.width / 2 + config.model.width * 5
    const y = config.canvas.height - config.model.height
    ;[{ x, y }].forEach(position => {
      const model = this.model() as ModelConstructor
      const instance = new model(position.x, position.y)
      this.models.push(instance)
    })
  }
})('play')
