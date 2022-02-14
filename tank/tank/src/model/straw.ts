import modelAbstract from './modelAbstract'
import { image } from './../service/image'
import straw from '../canvas/straw'

export default class extends modelAbstract implements IModel {
  canvas: ICanvas = straw
  name: string = 'straw'
  image(): HTMLImageElement {
    return image.get('straw')!
  }
  render(): void {
    super.draw()
  }
}
