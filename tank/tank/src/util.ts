import config from './config'
import water from './canvas/water'
import wall from './canvas/wall'
import steel from './canvas/steel'

export default {
  isTouch(x: number, y: number, models: IModel[] = [...water.models, ...wall.models, ...steel.models]): boolean {
    if (
      x < 0 ||
      x + config.model.width > config.canvas.width ||
      y < 0 ||
      y + config.model.height > config.canvas.height
    ) {
      return true
    }

    return models.some(model => {
      const state =
        x + config.model.width <= model.x ||
        x >= model.x + model.width ||
        y + config.model.height <= model.y ||
        y >= model.y + model.height

      return !state
    })
  },
}
