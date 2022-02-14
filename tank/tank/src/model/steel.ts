import { image } from '../service/image'
import modelAbstract from './modelAbstract'
export default class extends modelAbstract implements IModel {
  name: string = 'steel'
  image(): HTMLImageElement {
    return image.get('steel')!
  }
  render(): void {
    super.draw()
  }
}
