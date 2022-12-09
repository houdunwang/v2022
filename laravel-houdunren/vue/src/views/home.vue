<script setup lang="ts">
import ActivityItem from '@/components/activity-item.vue'
import LearnHistoryList from '@/components/learn-history-list.vue'
const route = useRoute()
const { collection, findAll } = useActivity()

await findAll(route.query.page || 1)
</script>

<template>
  <main class="grid grid-cols-12 gap-3" v-if="collection">
    <section class="col-span-9">
      <HdCard>
        <template #header>网站动态</template>
        <ActivityItem v-for="activity of collection?.data" :key="activity.id" :activity="activity" />
      </HdCard>
      <HdPagination
        :per_page="collection?.meta.per_page"
        :total="collection?.meta.total"
        @currentChange="$router.push({ name: 'home', query: { page: $event } })" />
    </section>

    <section class="col-span-3">
      <HdCard>
        <template #header>温馨提示</template>
        <div>后盾人是一个主张友好、分享、自由的技术交流社区。</div>
        <template #footer>
          <div class="flex justify-center">
            <el-button type="success" size="default" @click="$router.push({ name: 'topic.create' })"
              >发表贴子</el-button
            >
          </div>
        </template>
      </HdCard>
      <HdCard class="mt-3">
        <template #header>学习动态</template>
        <LearnHistoryList />
      </HdCard>
    </section>
  </main>
</template>
