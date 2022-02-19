import { directionEnum } from './../enum/directionEnum'
import bullet from '../canvas/bullet'
import { image } from '../service/image'
import modelAbstract from './modelAbstract'
export default class extends modelAbstract implements IModel {
  canvas: ICanvas = bullet
  name: string = 'wall'
  tank: IModel

  constructor(tank: IModel) {
    super(tank.x + tank.width / 2, tank.y + tank.height / 2)
    this.tank = tank
    this.direction = tank.direction as directionEnum
  }

  image(): HTMLImageElement {
    return image.get('bullet')!
  }
  render(): void {
    this.move()
  }

  protected move(): void {
    let x = this.x
    let y = this.y
    switch (this.direction) {
      case directionEnum.top:
        y -= 10
        break
      case directionEnum.right:
        x += 10
        break
      case directionEnum.bottom:
        y += 10
        break
      case directionEnum.left:
        x -= 10
        break
    }
    this.x = x
    this.y = y
    this.draw()
  }

  protected draw() {
    this.canvas.ctx.drawImage(this.image(), this.x, this.y, 2, 2)
  }
}
