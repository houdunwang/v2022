<script lang="ts" setup>
import { ref } from 'vue'
import { Plus } from '@element-plus/icons-vue'

import { ElUploadRequestOptions } from 'element-plus/es/components/upload/src/upload.type'
import { http } from '@/plugins/axios'

const imageUrl = ref('')

const handleSuccess = (response: any, uploadFile: any) => {
  imageUrl.value = response.data.url
}

const request = async (options: ElUploadRequestOptions) => {
  const formData = new FormData()
  formData.append('file', options.file)

  return http.request<{ url: string }>({
    method: 'POST',
    url: 'upload/image',
    data: formData,
  })
}
</script>

<template>
  <div class="">
    <el-upload
      class="avatar-uploader"
      action=""
      :http-request="request"
      :show-file-list="false"
      :on-success="handleSuccess">
      <img v-if="imageUrl" :src="imageUrl" class="avatar" />
      <el-icon v-else class="avatar-uploader-icon"><Plus /></el-icon>
    </el-upload>
    <div class="">
      <FormError name="file" />
    </div>
  </div>
</template>

<style scoped>
.avatar-uploader .avatar {
  height: 178px;
  display: block;
}
</style>

<style>
.avatar-uploader .el-upload {
  border: solid 1px #ddd !important;
  /* border: 1px dashed var(--el-border-color); */
  border-radius: 6px;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition: var(--el-transition-duration-fast);
}

.avatar-uploader .el-upload:hover {
  border-color: var(--el-color-primary);
}

.el-icon.avatar-uploader-icon {
  font-size: 28px;
  color: #8c939d;
  width: 178px;
  height: 178px;
  text-align: center;
}
</style>
