import config from '../config'
import canvasAbstract from './canvasAbstract'
import model from '../model/boss'
class water extends canvasAbstract implements ICanvas {
  num(): number {
    return config.water.num
  }
  model(): ModelConstructor {
    return model
  }

  render(): void {
    this.createModels()
    super.renderModels()
  }

  createModels() {
    const cw = config.canvas.width
    const ch = config.canvas.height
    const mh = config.model.height
    const pos = [{ x: cw / 2, y: ch - mh }]
    pos.forEach(position => {
      const model = this.model()
      const instance = new model(position.x, position.y)
      this.models.push(instance)
    })
  }
}

export default new water()
