import config from './config'
import './style.scss'
import straw from './canvas/straw'
import { promises } from './service/imageService'

async function bootstrap() {
  initApp()
  await Promise.all(promises)
  straw.render()
}

function initApp() {
  const app = document.querySelector('#app') as HTMLDivElement
  app.style.width = config.canvas.width + 'px'
  app.style.height = config.canvas.height + 'px'
}
void bootstrap()
