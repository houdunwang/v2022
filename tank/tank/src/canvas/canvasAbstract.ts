import { image } from './../service/imageService'
import config from '../config'

export default abstract class canvasAbstract {
  abstract render(): void
  protected models = []

  constructor(
    public el = document.createElement('canvas') as HTMLCanvasElement,
    public canvas = el.getContext('2d') as CanvasRenderingContext2D,
    protected app = document.querySelector('#app') as HTMLDivElement
  ) {
    el.width = config.canvas.width
    el.height = config.canvas.height

    app.insertAdjacentElement('afterbegin', el)
  }

  protected renderModel(num: number) {
    this.prositionCollection(num).map(position => {
      this.canvas.drawImage(image.get('straw')!, position.x, position.y, 30, 30)
    })
  }

  //生成指定数量的随机坐标
  protected prositionCollection(num: number) {
    const collection = [] as { x: number; y: number }[]
    for (let i = 0; i < num; i++) {
      while (true) {
        const position = this.postion()
        const exists = collection.some(p => p.x == position.x && p.y == position.y)
        if (!exists) {
          collection.push(position)
          break
        }
      }
    }
    return collection
  }

  //生成坐标
  protected postion() {
    return {
      x: Math.floor(Math.random() * (config.canvas.width / config.model.width)) * config.model.width,
      y: Math.floor(Math.random() * (config.canvas.height / config.model.height)) * config.model.height,
    }
  }
}
