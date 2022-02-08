import config from '../config'

type MapKey = keyof typeof config.images
export const image = new Map<MapKey, HTMLImageElement>()

export const promises = Object.entries(config.images).map(([key, value]) => {
  return new Promise(resolve => {
    const img = document.createElement('img')
    img.src = value
    img.onload = () => {
      image.set(key as MapKey, img)
      resolve(img)
    }
  })
})
