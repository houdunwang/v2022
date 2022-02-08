import config from '../config'
import { image } from '../service/imageService'
import canvasAbstract from './canvasAbstract'
class straw extends canvasAbstract {
  render(): void {
    // this.canvas.drawImage(image.get('straw')!, 0, 0, 20, 20)
    super.renderModel(config.straw.num)
  }
}

export default new straw()
