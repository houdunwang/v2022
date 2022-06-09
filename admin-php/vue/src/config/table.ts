export type TableFieldType = {
  id: string
  label: string
  width: number
  type?: 'image' | 'date'
}

export type TableButton = {
  title: string
  command: string
  type: 'primary' | 'danger' | 'success' | 'default'
}

export const UserTableField = [
  { id: 'id', label: 'ID', width: 50 },
  { id: 'name', label: '昵称' },
  { id: 'home', label: '主页' },
  { id: 'weibo', label: '微博' },
  { id: 'avatar', label: '头像', type: 'image' },
  { id: 'created_at', label: '创建时间', type: 'date' },
  { id: 'updated_at', label: '更新时间', type: 'date' },
] as TableFieldType[]
