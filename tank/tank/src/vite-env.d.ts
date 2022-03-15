/// <reference types="vite/client" />

interface ModelConstructor {
  new (x: number, y: number): IModel
}

interface BulletModelConstructor {
  new (tank: IModel): IModel
}

interface IModel {
  name: string
  render(): void
  tank?: IModel
  x: number
  y: number
  width: number
  height: number
  direction: string
  destroy(): void
}

interface ICanvas {
  model(): ModelConstructor | BulletModelConstructor
  num(): number
  ctx: CanvasRenderingContext2D
  removeModel(model: IModel): void
  renderModels(): void
  stop?(): void
}
