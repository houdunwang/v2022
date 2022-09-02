import { getAllCategory } from '@/apis/category'

export default () => {
  const categories = ref<CategoryModel[]>()

  const all = async () => {
    categories.value = await getAllCategory()
  }

  return { all, categories }
}
