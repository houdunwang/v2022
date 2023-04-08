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
  state: 9,
  interval: 0,
  bootstrap() {
    app.addEventListener('click', async () => {
      await this.start()
      this.interval = setInterval(() => {
        if (tank.models.length == 0) this.state = 1
        if (
          play.models.length == 0 ||
          boss.models.length == 0
        )
          this.state = 0
        if (this.state != 9) this.stop()
      }, 100)
    })
  },
  stop() {
    clearInterval(this.interval)
    tank.stop()
    bullet.stop()
    this.text()
  },
  text() {
    const el = document.createElement('canvas')
    el.width = config.canvas.width
    el.height = config.canvas.height
    const ctx = el.getContext('2d')!
    ctx.fillStyle = 'red'
    ctx.font = '80px CascadiaMono'
    ctx.textBaseline = 'middle'
    ctx.textAlign = 'center'
    ctx.fillText(
      this.state == 1 ? '恭喜你，赢得胜利' : '啥也不是',
      config.canvas.width / 2,
      config.canvas.height / 2,
    )
    app.appendChild(el)
  },
  async start() {
    if (this.isStart === true) return
    audio.start()
    this.isStart = true
    app.style.backgroundImage = 'none'
    await Promise.all(promises)

    straw.render()
    wall.render()
    water.render()
    steel.render()
    tank.render()
    bullet.render()
    boss.render()
    play.render()
  },
}
