import config from '../config'
import position from '../service/position'

export default abstract class canvasAbstract {
  public models: IModel[] = []
  abstract num(): number
  abstract model(): ModelConstructor
  abstract render(): void

  constructor(
    protected app = document.querySelector('#app') as HTMLDivElement,
    protected el = document.createElement('canvas'),
    public ctx = el.getContext('2d')!
  ) {
    this.createCanvas()
  }

  //创建画布
  protected createCanvas() {
    this.el.width = config.canvas.width
    this.el.height = config.canvas.height
    this.app.insertAdjacentElement('afterbegin', this.el)
  }

  //生成模型实例
  protected createModels() {
    position.getCollection(this.num()).forEach(position => {
      const model = this.model()
      const instance = new model(position.x, position.y)
      this.models.push(instance)
    })
  }

  //将模型渲染到画布上
  protected renderModels() {
    this.models.forEach(model => model.render())
  }
}
