import { image } from '../service/image'
import modelAbstract from './modelAbstract'
export default class extends modelAbstract implements IModel {
  render(): void {
    super.draw(image.get('wall')!)
  }
}
