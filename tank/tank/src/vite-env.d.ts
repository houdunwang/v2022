/// <reference types="vite/client" />

interface ModelConstructor {
  new (x: number, y: number): IModel
}

interface BulletModelConstructor {
  new (tank: IModel): IModel
}

type directionType = 'top' | 'bottom' | 'left' | 'right'

interface IModel {
  render(): void
  x: number
  y: number
  width: number
  height: number
  tank?: IModel
  direction: directionType
}

interface ICanvas {
  model(): ModelConstructor | BulletModelConstructor
  num(): number
  ctx: CanvasRenderingContext2D
}
