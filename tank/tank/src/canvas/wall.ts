import config from '../config'
import canvasAbstract from './canvasAbstract'
import model from '../model/wall'
class wall extends canvasAbstract implements ICanvas {
  num(): number {
    return config.wall.num
  }
  model(): ModelConstructor {
    return model
  }
  render(): void {
    super.createModels()
    super.renderModels()
    this.bossWall()
  }

  bossWall() {
    const cw = config.canvas.width
    const ch = config.canvas.height
    const mw = config.model.width
    const mh = config.model.height

    const pos = [
      { x: cw / 2 - mw * 2, y: ch - mh },
      { x: cw / 2 - mw * 2, y: ch - mh * 2 },
      { x: cw / 2 - mw * 2, y: ch - mh * 3 },
      { x: cw / 2 - mw, y: ch - mh * 3 },
      { x: cw / 2, y: ch - mh * 3 },
      { x: cw / 2 + mw, y: ch - mh * 3 },
      { x: cw / 2 + mw * 2, y: ch - mh * 3 },
      { x: cw / 2 + mw * 2, y: ch - mh * 2 },
      { x: cw / 2 + mw * 2, y: ch - mh },
    ]

    pos.forEach(position => {
      const model = this.model()
      const instance = new model(position.x, position.y)
      this.models.push(instance)
    })
  }
}

export default new wall()
