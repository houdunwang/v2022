import config from './config'
import water from './canvas/water'
import wall from './canvas/wall'
import steel from './canvas/steel'
import boss from './canvas/boss'

export default {
  //撞墙
  isTouchCanvas(x: number, y: number): boolean {
    return (
      x < 0 || x + config.model.width > config.canvas.width || y < 0 || y + config.model.height > config.canvas.height
    )
  },
  //触碰模型
  isTouchModel(
    x: number,
    y: number,
    width = config.model.width,
    height = config.model.height,
    models: IModel[] = [...water.models, ...wall.models, ...steel.models, ...boss.models]
  ): IModel | undefined {
    return models.find(model => {
      const state =
        x + width <= model.x || x >= model.x + model.width || y + height <= model.y || y >= model.y + model.height
      return !state
    })
  },
}
