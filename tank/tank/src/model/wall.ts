import wall from '../canvas/wall'
import { image } from '../service/image'
import modelAbstract from './modelAbstract'
export default class extends modelAbstract implements IModel {
  canvas: ICanvas = wall
  name: string = 'wall'
  image(): HTMLImageElement {
    return image.get('wall')!
  }
  render(): void {
    super.draw()
  }
}
