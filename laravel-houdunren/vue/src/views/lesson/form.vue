<script setup lang="ts">
const { add, removeVideo, addVideo, model, find, update } = useLesson()
const { getAll: getAllSystem, collection } = useSystem()
const route = useRoute()

await Promise.all([getAllSystem()])
const form = ref()
if (route.params.id) {
  form.value = await find(route.params.id)
} else {
  form.value = {
    title: '',
    description: '',
    preview: '',
    system_id: undefined,
    videos: [
      { title: '', path: '' },
      { title: '', path: '' },
      { title: '', path: '' },
      { title: '', path: '' },
      { title: '', path: '' },
      { title: '', path: '' },
    ],
  }
}

const onSubmit = async () => {
  route.params.id ? update(form.value) : add(form.value)
}
</script>

<template>
  <main class="" v-if="form">
    <HdCard>
      <template #header>添加课程</template>
      <el-form label-width="80px" :inline="false" size="default" label-position="top">
        <el-form-item label="课程名称">
          <el-input v-model="form.title"></el-input>
          <HdError name="title" />
        </el-form-item>
        <el-form-item label="系统课程">
          <el-select v-model="form.system_id" placeholder="选择系统课程" clearable filterable>
            <el-option v-for="item in collection" :key="item.id" :label="item.title" :value="item.id"> </el-option>
          </el-select>
          <HdError name="system_id" />
        </el-form-item>
        <el-form-item label="预览图">
          <div class="flex flex-col">
            <HdUploadSingleImage v-model="form.preview" />
            <HdError name="preview" />
          </div>
        </el-form-item>
        <el-form-item label="课程介绍 ">
          <el-input v-model="form.description" type="textarea"></el-input>
          <HdError name="description" />
        </el-form-item>
      </el-form>
    </HdCard>

    <HdCard class="mt-3">
      <template #header>视频</template>
      <section class="grid grid-cols-4 gap-2">
        <div
          class="flex flex-col gap-1 border shadow-sm p-3 rounded-md relative group"
          v-for="(video, index) of form.videos"
          :key="index">
          <el-input v-model="video.title" placeholder="视频标题" size="default" clearable></el-input>
          <el-input v-model="video.path" placeholder="视频地址" size="default" clearable></el-input>
          <icon-close-one
            theme="outline"
            size="20"
            fill="#555"
            class="absolute top-0 right-0 bg-white hidden group-hover:block duration-300 cursor-pointer"
            @click="removeVideo(form.videos, index)" />
        </div>
      </section>
      <template #footer>
        <el-button type="info" size="small" @click="addVideo(form.videos)">添加视频</el-button>
      </template>
    </HdCard>
    <div class="mt-3">
      <el-button type="primary" @click="onSubmit">保存提交</el-button>
    </div>
  </main>
</template>

<style lang="scss"></style>
