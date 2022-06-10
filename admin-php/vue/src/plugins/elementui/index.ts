import { App } from 'vue'
import 'element-plus/dist/index.css'
import ElementPlus from 'element-plus'
import zhCn from 'element-plus/es/locale/lang/zh-cn'
export default function setupElementPlus(app: App) {
  app.use(ElementPlus, {
    locale: zhCn,
  })
}
