import modelAbstract from './modelAbstract'
import { image } from './../service/image'

export default class extends modelAbstract implements IModel {
  name: string = 'straw'
  image(): HTMLImageElement {
    return image.get('straw')!
  }
  render(): void {
    super.draw()
  }
}
