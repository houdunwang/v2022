// import { IMenu } from '#/menu'
import 'vue-router'

import { IconType } from '@icon-park/vue-next/es/all'

interface Menu {
  title?: string
  icon?: IconType
  isClick?: boolean
  route?: string
}

export interface IMenu extends Menu {
  children?: Menu[]
}

declare module 'vue-router' {
  interface RouteMeta {
    title?: string
    auth?: boolean
    guest?: boolean
    menu?: IMenu
    enterClass?: string
    leaveClass?: string
    permission?: string
  }
}
