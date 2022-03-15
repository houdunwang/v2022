import play from '../canvas/play'
import { image } from '../service/image'
import modelAbstract from './modelAbstract'
import _ from 'lodash'
import { directionEnum } from '../enum/directionEnum'
import util from '../util'
import bullet from '../canvas/bullet'
export default class extends modelAbstract implements IModel {
  canvas: ICanvas = play
  name: string = 'play'
  bindEvent = false
  image(): HTMLImageElement {
    let direction = this.name + _.upperFirst(this.direction)
    return image.get(direction as any)!
  }
  render(): void {
    super.draw()
    if (this.bindEvent === false) {
      this.bindEvent = true
      document.addEventListener('keydown', this.changeDirection.bind(this))
      document.addEventListener('keydown', this.move.bind(this))
      document.addEventListener('keydown', (event: KeyboardEvent) => {
        if (event.code === 'Space') bullet.addPlayBullet()
      })
    }
  }

  changeDirection(event: KeyboardEvent) {
    switch (event.code) {
      case 'ArrowUp':
        this.direction = directionEnum.top
        break
      case 'ArrowDown':
        this.direction = directionEnum.bottom
        break
      case 'ArrowLeft':
        this.direction = directionEnum.left
        break
      case 'ArrowRight':
        this.direction = directionEnum.right
        break
    }
  }

  move(event: KeyboardEvent) {
    let x = this.x
    let y = this.y
    switch (event.code) {
      case 'ArrowUp':
        y -= 5
        break
      case 'ArrowDown':
        y += 5
        break
      case 'ArrowLeft':
        x -= 5
        break
      case 'ArrowRight':
        x += 5
        break
    }
    if (util.isCanvasTouch(x, y) || util.isModelTouch(x, y)) {
      return
    }
    this.x = x
    this.y = y

    this.canvas.renderModels()
  }
}
