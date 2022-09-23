//请求响应结构
interface ApiData<T> {
  code: number
  message: string
  status: 'success' | 'error'
  data: T
}

//分页请求响应结构
interface ApiPage<T> {
  data: T[]
  meta: {
    current_page: number
    row: number
    total: number
    page_row: number
  }
}
