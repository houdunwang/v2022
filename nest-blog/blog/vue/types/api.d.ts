//请求响应结构
interface ResponseResult<T> {
  data: T
}

//分页请求响应结构
interface ResponsePageResult<T> {
  data: T[]
  meta: {
    current_page: number
    page_row: number
    total: number
    total_page: number
  }
}
