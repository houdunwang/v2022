<script setup lang="ts"></script>

<template>
  <section>
    <h5>模块管理</h5>
    <ul>
      <li>
        <icon-category-management theme="outline" />
        模块列表
      </li>
      <li>
        <icon-category-management theme="outline" />
        模块设计
      </li>
    </ul>
  </section>

  <section>
    <h5>系统管理</h5>
    <ul>
      <li @click="$router.push({ name: 'config.edit' })">
        <icon-category-management theme="outline" />
        系统配置
      </li>
    </ul>
  </section>
</template>

<style lang="scss">
section {
  @apply mt-5;
  h5 {
    @apply flex items-center mb-3 text-base font-bold text-gray-600 opacity-95;
    &::before {
      content: '';
      @apply bg-[#16a085] w-[5px] h-[15px] block mr-1;
    }
  }
  ul {
    @apply flex;
    li {
      @apply flex flex-col justify-center items-center bg-[#34495e] opacity-70 py-5 text-white rounded-md cursor-pointer hover:opacity-100 duration-300 shadow-sm hover:shadow-lg w-[120px] text-base mr-5;
      span {
        @apply text-3xl mb-2;
      }
    }
  }
}
</style>
