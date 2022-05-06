<script setup lang="ts"></script>

<template>
  <button class="hd-button mt-5">
    <slot />
  </button>
</template>

<style lang="scss">
.hd-button {
  @apply py-2 px-4 rounded-md;
  &.primary {
    @apply bg-violet-700 text-white hover:bg-violet-500 duration-300;
  }
  &.danger {
    @apply bg-fuchsia-700 hover:bg-fuchsia-500 text-white;
  }
  &[disabled] {
    @apply bg-gray-400 cursor-not-allowed text-white hover:bg-gray-400;
  }
}
</style>
