import canvasAbstract from './canvasAbstract'
import model from '../model/bullet'
import bullet from '../model/bullet'
import tank from './tank'
export default new (class extends canvasAbstract implements ICanvas {
  num(): number {
    return 0
  }
  model() {
    return model
  }
  render(): void {
    setInterval(() => {
      this.addBullet()
      super.renderModels()
    }, 20)
  }

  addBullet() {
    tank.models.forEach(tank => {
      const isHas = this.models.some(model => model.tank == tank)
      if (!isHas) this.models.push(new bullet(tank))
    })
  }
})()
