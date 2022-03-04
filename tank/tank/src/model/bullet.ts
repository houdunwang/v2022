import { directionEnum } from './../enum/directionEnum'
import bullet from '../canvas/bullet'
import { image } from '../service/image'
import modelAbstract from './modelAbstract'
import util from '../util'
import wall from '../canvas/wall'
import steel from '../canvas/steel'
import boss from '../canvas/boss'
import play from '../canvas/play'
import tank from '../canvas/tank'
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
        y -= 5
        break
      case directionEnum.right:
        x += 5
        break
      case directionEnum.bottom:
        y += 5
        break
      case directionEnum.left:
        x -= 5
        break
    }

    const touchModel = util.isTouchModel(x, y, 2, 2, [
      ...wall.models,
      ...steel.models,
      ...boss.models,
      ...tank.models,
      ...play.models,
    ])

    if (util.isTouchCanvas(x, y, 2, 2)) {
      this.destroy()
    } else if (touchModel && touchModel.name != this.tank.name) {
      this.blast(touchModel)
      this.destroy()
      if (touchModel.name != 'steel') touchModel.destroy()
    } else {
      this.x = x
      this.y = y
      this.draw()
    }
  }

  protected draw() {
    this.canvas.ctx.drawImage(this.image(), this.x, this.y, 2, 2)
  }
}
