import straw from './static/images/straw/straw.png'
import wall from './static/images/wall/wall.gif'
import water from './static/images/water/water.gif'
import steel from './static/images/wall/steels.gif'
import tankTop from './static/images/tank/top.gif'
import tankRight from './static/images/tank/right.gif'
import tankBottom from './static/images/tank/bottom.gif'
import tankLeft from './static/images/tank/left.gif'

export default {
  timeout: 10,
  canvas: {
    width: 900,
    height: 600,
  },
  model: {
    width: 30,
    height: 30,
  },
  straw: {
    num: 200,
  },
  wall: {
    num: 80,
  },
  water: {
    num: 20,
  },
  steel: {
    num: 10,
  },
  tank: {
    num: 20,
  },
  images: {
    straw,
    wall,
    water,
    steel,
    tankTop,
    tankRight,
    tankBottom,
    tankLeft,
  },
}
