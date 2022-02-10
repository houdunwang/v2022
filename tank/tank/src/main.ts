import straw from './canvas/straw'
import config from './config'
import './style.scss'
import './service/image'
import { promises } from './service/image'

const app = document.querySelector<HTMLDivElement>('#app')!
app.style.width = config.canvas.width + 'px'
app.style.height = config.canvas.height + 'px'

async function bootstrap() {
  await Promise.all(promises)

  straw.render()
}

void bootstrap()
