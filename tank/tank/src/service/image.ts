import config from '../config'

type mapKey = keyof typeof config.images
export const image = new Map<mapKey, HTMLImageElement>()

export const promises = Object.entries(config.images).map(([key, value]) => {
  return new Promise(resolve => {
    const img = document.createElement('img')
    img.src = value
    img.onload = () => {
      image.set(key as mapKey, img)
      resolve(img)
    }
  })
})
