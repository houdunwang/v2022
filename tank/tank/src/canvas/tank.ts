import config from '../config'
import canvasAbstract from './canvasAbstract'
import model from '../model/tank'
import position from '../service/position'
export default new (class extends canvasAbstract implements ICanvas {
  intervalId = 0
  num(): number {
    return config.tank.num
  }
  model(): ModelConstructor {
    return model
  }
  stop() {
    clearInterval(this.intervalId)
  }
  render(): void {
    this.createModels()
    this.renderModels()

    this.intervalId = setInterval(() => this.renderModels(), config.timeout)
  }

  renderModels() {
    this.ctx.clearRect(0, 0, config.canvas.width, config.canvas.height)
    super.renderModels()
  }

  //生成模型实例
  protected createModels() {
    for (let i = 0; i < this.num(); i++) {
      const pos = position.position()
      const model = this.model()
      const instance = new model(pos.x, 0)
      this.models.push(instance)
    }
  }
})('tank')
