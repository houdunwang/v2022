<script setup lang="ts">
import dayjs from 'dayjs'
import UserItem from './user-item.vue'

const { activity } = defineProps<{ activity: ActivityModel }>()
</script>

<template>
  <main class="">
    <section class="flex border-b py-3 border-b-gray-200 justify-between">
      <div class="flex gap-2">
        <UserItem :user="activity.user" class="" />
        <div class="flex flex-col justify-between">
          <div class="flex items-center">
            <template v-if="activity.properties.type == 'topic'">
              <el-tag type="success" size="small" effect="dark" class="mr-1"> 贴子 </el-tag>
              <router-link :to="{ name: 'topic.show', params: { id: activity.id } }">
                {{ activity.title }}
              </router-link>
            </template>
            <template v-else-if="activity.properties.type == 'comment'">
              <el-tag type="warning" size="small" effect="dark" class="mr-1"> 评论 </el-tag>
              <router-link
                :to="{
                  name: activity.properties.model.type.toLowerCase() + '.show',
                  params: { id: activity.properties.model.id },
                  query: { commentId: activity.properties.id },
                }">
                {{ activity.title }}
              </router-link>
            </template>
          </div>
          <span class="text-gray-500 text-xs"
            >{{ activity.user.name }} 发表于 {{ dayjs(activity.created_at).fromNow() }}
          </span>
        </div>
      </div>
    </section>
  </main>
</template>

<style lang="scss"></style>
