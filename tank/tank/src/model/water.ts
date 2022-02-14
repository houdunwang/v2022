import water from '../canvas/water'
import { image } from '../service/image'
import modelAbstract from './modelAbstract'
export default class extends modelAbstract implements IModel {
  canvas: ICanvas = water
  name: string = 'water'
  image(): HTMLImageElement {
    return image.get('water')!
  }
  render(): void {
    super.draw()
  }
}
