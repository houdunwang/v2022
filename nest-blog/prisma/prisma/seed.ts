import { article } from './seeds/article'
import { category } from './seeds/category'
import { user } from './seeds/user'

async function run() {
  user()
  await category()
  article()
}

run()

// async function a() {
//   await new Promise((r) => {
//     setTimeout(() => {
//       console.log('a')
//       r('ok')
//     }, 3000)
//   })
// }
// function c() {
//   console.log('cc')
// }
// async function b() {
//   await a()
//   c()
// }

// b()
