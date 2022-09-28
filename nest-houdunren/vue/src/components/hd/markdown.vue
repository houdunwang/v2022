<script setup lang="ts">
import { ref, watch, withDefaults } from 'vue'
import VueMarkdownEditor from '@kangc/v-md-editor'
import useUpload from '@/composables/useUpload'
const { uploadImage } = useUpload()
const props = withDefaults(
  defineProps<{
    modelValue: any
    height?: string
  }>(),
  { height: '300px' },
)

const emit = defineEmits<{
  (e: 'update:modelValue', value: any): void
}>()
const text = ref(props.modelValue)

watch(text, (value) => {
  emit('update:modelValue', value)
})

const handleUploadImage = async (event: any, insertImage: any, files: any) => {
  const form = new FormData()
  form.append('file', files[0])
  const { data } = await uploadImage(form)

  insertImage({ url: data.url })
}
</script>

<template>
  <VueMarkdownEditor
    :value="modelValue"
    v-model="text"
    :disabled-menus="[]"
    :height="props.height"
    @upload-image="handleUploadImage" />
</template>
