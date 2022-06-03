interface ResponseResult<T> {
  code: number
  message: string
  status: 'success' | 'error'
  data: T
}

interface ResponsePageResult<T> {
  data: T[]
  links: {
    first: string
    last: string
    prev?: any
    next: string
  }
  meta: {
    current_page: number
    from: number
    last_page: number
    links: {
      url?: string
      label: string
      active: boolean
    }[]
    path: string
    per_page: number
    to: number
    total: number
  }
}
