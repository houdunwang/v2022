/// <reference types="vite/client" />

interface ModelConstructor {
  new (canvas: CanvasRenderingContext2D, x: number, y: number): IModel
}

interface IModel {
  render(): void
}

interface ICanvas {
  model(): ModelConstructor
  num(): number
}
