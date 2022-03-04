import canvasAbstract from './canvasAbstract'
import model from '../model/bullet'
import bullet from '../model/bullet'
import tank from './tank'
import play from './play'
import audio from '../service/audio'
export default new (class extends canvasAbstract implements ICanvas {
  intervalId = 0
  num(): number {
    return 0
  }
  model() {
    return model
  }
  render(): void {
    this.intervalId = setInterval(() => {
      this.addBullet()
      super.renderModels()
    }, 20)
  }
  stop() {
    clearInterval(this.intervalId)
  }
  addBullet() {
    tank.models.forEach(tank => {
      const isHas = this.models.some(model => model.tank == tank)
      if (!isHas) {
        audio.fire()
        this.models.push(new bullet(tank))
      }
    })
  }

  addPlayBullet() {
    this.models.push(new bullet(play.models[0]))
  }
})('bullet')
