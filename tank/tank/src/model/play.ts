import _ from 'lodash'
import bullet from '../canvas/bullet'
import play from '../canvas/play'
import { directionEnum } from '../enum/directionEnum'
import { image } from '../service/image'
import util from '../util'
import modelAbstract from './modelAbstract'
export default class extends modelAbstract implements IModel {
  canvas: ICanvas = play
  name: string = 'play'
  bindEvent = false
  image() {
    let direction = this.name + _.upperFirst(this.direction)
    return image.get(direction as any)!
  }
  render(): void {
    super.draw()
    if (this.bindEvent === false) {
      document.addEventListener('keydown', this.changeCirection.bind(this))
      document.addEventListener('keydown', this.move.bind(this))
      document.addEventListener('keydown', (event: KeyboardEvent) => {
        if (event.code == 'Space') bullet.addPlayBullet()
      })

      this.bindEvent = true
    }
  }
  changeCirection(event: KeyboardEvent) {
    switch (event.code) {
      case 'ArrowUp':
        this.direction = directionEnum.top
        break
      case 'ArrowRight':
        this.direction = directionEnum.right
        break
      case 'ArrowDown':
        this.direction = directionEnum.bottom
        break
      case 'ArrowLeft':
        this.direction = directionEnum.left
        break
    }
    this.canvas.renderModels()
  }

  move(event: KeyboardEvent) {
    let x = this.x
    let y = this.y
    switch (event.code) {
      case 'ArrowUp':
        y -= 5
        break
      case 'ArrowRight':
        x += 5
        break
      case 'ArrowDown':
        y += 5
        break
      case 'ArrowLeft':
        x -= 5
        break
    }

    if (util.isTouchCanvas(x, y) || util.isTouchModel(x, y)) {
      return
    }

    this.x = x
    this.y = y

    this.canvas.renderModels()
  }
}
