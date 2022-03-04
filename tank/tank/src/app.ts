import straw from './canvas/straw'
import config from './config'
import './style.scss'
import './service/image'
import { promises } from './service/image'
import wall from './canvas/wall'
import water from './canvas/water'
import steel from './canvas/steel'
import tank from './canvas/tank'
import bullet from './canvas/bullet'
import boss from './canvas/boss'
import play from './canvas/play'
import audio from './service/audio'

const app = document.querySelector<HTMLDivElement>('#app')!
app.style.width = config.canvas.width + 'px'
app.style.height = config.canvas.height + 'px'

export default {
  isStart: false,
  isEnd: false,
  state: 9,
  intervalId: 0,
  async bootstrap() {
    document.querySelector('#app')?.addEventListener('click', () => {
      if (this.isStart === false) {
        this.isStart = true
        this.runEvent()
        this.start()
        app.style.backgroundImage = 'none'
      }
    })
  },
  runEvent() {
    this.intervalId = setInterval(() => {
      if (boss.models.length === 0 || play.models.length == 0) {
        this.state = 0
        this.stop()
      }

      if (tank.models.length === 0) {
        this.state = 1
        this.stop()
      }
    }, 100)
  },
  stop() {
    clearInterval(this.intervalId)
    tank.stop()
    bullet.stop()

    const el = document.createElement('canvas') as HTMLCanvasElement
    el.width = config.canvas.width
    el.height = config.canvas.height
    const ctx = el.getContext('2d')!
    ctx.fillStyle = 'red'
    ctx.font = '80px CascadiaMono'
    ctx.textBaseline = 'middle'
    ctx.textAlign = 'center'
    ctx.fillText(this.state == 1 ? '胜利了' : '输了，可惜了', config.canvas.width / 2, config.canvas.height / 2)
    app.appendChild(el)
  },
  async start() {
    audio.start()
    await Promise.all(promises)
    play.render()
    straw.render()
    wall.render()
    water.render()
    steel.render()
    tank.render()
    bullet.render()
    boss.render()
  },
}
