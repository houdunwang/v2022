<script setup lang="ts"></script>

<template>
  <div>
    <HdAnimateList tag="ul" :duration="2" :delay="0.1">
      <li v-for="(num, index) of 10" :data-index="index">
        {{ num }}
      </li>
    </HdAnimateList>
  </div>
</template>

<style lang="scss" scoped>
ul {
  li {
    @apply bg-purple-600 text-white p-2 mb-2;
  }
}
</style>
