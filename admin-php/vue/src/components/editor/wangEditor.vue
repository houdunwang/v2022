<script lang="ts" setup>
// import '@wangeditor/editor/dist/css/style.css'
// import { onBeforeUnmount, ref, shallowRef, watch } from 'vue'
// import { Editor, Toolbar } from '@wangeditor/editor-for-vue'
// import { IEditorConfig, IDomEditor, IToolbarConfig, createToolbar, DomEditor } from '@wangeditor/editor'

import { uploadImage } from '@/apis/uploadApi'

// interface IProps {
//   modelValue?: any
// }
// const props = withDefaults(defineProps<IProps>(), {
//   modelValue: '',
// })

// const emit = defineEmits(['update:modelValue'])

// 编辑器实例，必须用 shallowRef
// const editorRef = shallowRef<IDomEditor>()

// 内容 HTML
// const valueHtml = ref(props.modelValue)

// 组件销毁时，也及时销毁编辑器
// onBeforeUnmount(() => {
//   const editor = editorRef.value
//   if (editor == null) return
//   editor.destroy()
// })

// const handleCreated = (editor: IDomEditor) => {
//   editorRef.value = editor
// }

// watch([valueHtml], (value: any) => {
//   emit('update:modelValue', editorRef.value?.getHtml())
// })

// 创建工具栏
// const mode = ref('default')

// const toolbarConfig: Partial<IToolbarConfig> = {
//   excludeKeys: ['group-video', 'undo', 'redo'],
// }

// const editorConfig: Partial<IEditorConfig> = {
//   MENU_CONF: {
//     uploadImage: {
//       server: '/api/upload/image',
//     },
//   },
// }
const win = window as any

// const editorConfig: Partial<any> = {}
// editorConfig.placeholder = '请输入内容'
// editorConfig.onChange = (editor: any) => {
//   // 当编辑器选区、内容变化时，即触发
//   console.log('content', editor.children)
//   console.log('html', editor.getHtml())
// }

const editorConfig: Partial<any> = {
  MENU_CONF: {
    uploadImage: {
      async customUpload(file: File, insertFn: any) {
        console.log(file)
        const form = new FormData()
        form.append('file', file, file.name)
        const data = await uploadImage(form).then((r) => r.data)
        console.log(data)
        // file 即选中的文件
        // 自己实现上传，并得到图片 url alt href
        // 最后插入图片
        insertFn(data.url, '', '')
      },
    },
  },
}

// 工具栏配置
const toolbarConfig: Partial<any> = {}

onMounted(() => {
  // 创建编辑器
  const editor = win.wangEditor.createEditor({
    selector: '#editor-container',
    config: editorConfig,
    mode: 'default', // 或 'simple' 参考下文
  })
  // 创建工具栏
  const toolbar = win.wangEditor.createToolbar({
    editor,
    selector: '#toolbar-container',
    config: toolbarConfig,
    mode: 'default', // 或 'simple' 参考下文
  })
})
</script>

<template>
  <div style="border: 1px solid #ccc">
    <!-- <Toolbar style="border-bottom: 1px solid #ccc" :editor="editorRef" :defaultConfig="toolbarConfig" :mode="mode" />
    <Editor
      style="height: 500px; overflow-y: hidden"
      v-model="valueHtml"
      :defaultConfig="editorConfig"
      :mode="mode"
      @onCreated="handleCreated" /> -->
    <div id="toolbar-container" class="border-b"></div>
    <div id="editor-container" style="height: 300px"></div>
  </div>
</template>

<style lang="scss" scoped>
.w-e-full-screen-container {
  z-index: 9999;
}
</style>
