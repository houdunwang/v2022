import steel from '../canvas/steel'
import { image } from '../service/image'
import modelAbstract from './modelAbstract'
export default class extends modelAbstract implements IModel {
  public canvas: ICanvas = steel
  name: string = 'steel'
  image(): HTMLImageElement {
    return image.get('steel')!
  }
  render(): void {
    super.draw()
  }
}
