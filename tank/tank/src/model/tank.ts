import { image } from './../service/image'
import { directionEnum } from './../enum/directionEnum'
import modelAbstract from './modelAbstract'
import _ from 'lodash'
import config from '../config'
export default class extends modelAbstract implements IModel {
  name: string = 'tank'

  render(): void {
    this.move()
  }

  protected move(): void {
    switch (this.direction) {
      case directionEnum.top:
        this.y--
        break
      case directionEnum.right:
        this.x++
        break
      case directionEnum.bottom:
        this.y++
        break
      case directionEnum.left:
        this.x--
        break
    }
    super.draw()
  }

  image() {
    let direction = this.name + _.upperFirst(this.direction)
    return image.get(direction as keyof typeof config.images)!
  }
}
