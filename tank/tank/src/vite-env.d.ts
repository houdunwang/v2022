/// <reference types="vite/client" />

interface ModelConstructor {
  new (x: number, y: number): IModel
}

interface IModel {
  render(): void
  x: number
  y: number
  width: number
  height: number
}

interface ICanvas {
  model(): ModelConstructor
  num(): number
  ctx: CanvasRenderingContext2D
}
