import { image } from './../service/image'
import { directionEnum } from './../enum/directionEnum'
import modelAbstract from './modelAbstract'
import _ from 'lodash'
import config from '../config'
import tank from '../canvas/tank'
import util from '../util'

export default class extends modelAbstract implements IModel {
  canvas: ICanvas = tank
  name: string = 'tank'

  render(): void {
    this.move()
    if (_.random(20) == 1) this.direction = directionEnum.bottom
  }

  protected move(): void {
    while (true) {
      let x = this.x
      let y = this.y
      switch (this.direction) {
        case directionEnum.top:
          y--
          break
        case directionEnum.right:
          x++
          break
        case directionEnum.bottom:
          y++
          break
        case directionEnum.left:
          x--
          break
      }
      if (util.isModelTouch(x, y) || util.isCanvasTouch(x, y)) {
        this.randomDirection()
      } else {
        this.x = x
        this.y = y
        break
      }
    }
    super.draw()
  }

  image() {
    let direction = this.name + _.upperFirst(this.direction)
    return image.get(direction as keyof typeof config.images)!
  }
}
