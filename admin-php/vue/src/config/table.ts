export type TableFieldType = {
  id: string
  label: string
  width: number
  type?: 'image' | 'date' | 'tag'
  tag_field?: string
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
  { id: 'avatar', label: '头像', type: 'image', width: 100 },
  { id: 'created_at', label: '创建时间', type: 'date' },
  { id: 'updated_at', label: '更新时间', type: 'date' },
] as TableFieldType[]

export const AdminTableField = [
  { id: 'id', label: 'ID', width: 50 },
  { id: 'name', label: '昵称' },
  { id: 'roles', label: '角色', type: 'tag', tag_field: 'title' },
  { id: 'weibo', label: '微博' },
  { id: 'avatar', label: '头像', type: 'image', width: 100 },
  { id: 'created_at', label: '创建时间', type: 'date', width: 150 },
] as TableFieldType[]

export const ModuleTableField = [
  { id: 'id', label: 'ID', width: 80 },
  { id: 'name', label: '模块标识' },
  { id: 'preview', label: '图标', type: 'image', width: 80 },
  { id: 'title', label: '模块名称' },
  { id: 'version', label: '版本号' },
  { id: 'author', label: '开发者' },
] as TableFieldType[]

export const RoleTableField = [
  { id: 'id', label: 'ID', width: 80 },
  { id: 'title', label: '角色名称' },
  { id: 'name', label: '角色标识' },
  { id: 'permissions', label: '权限', type: 'tag', tag_field: 'title' },
  { id: 'created_at', label: '创建时间', type: 'date', width: 150 },
] as TableFieldType[]
