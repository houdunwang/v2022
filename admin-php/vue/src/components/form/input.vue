<script setup lang="ts">
const props = defineProps({
  modelValue: String,
})

// onUpdated(() => {
//   console.log('update.... input')
// })
</script>

<template>
  <input
    type="text"
    class="hd-input"
    :value="props.modelValue"
    @input="$emit('update:modelValue', ($event.target as HTMLInputElement).value)" />
</template>

<style lang="scss">
.hd-input {
  @apply border w-full rounded-md py-2 px-2 outline-none border-gray-200 placeholder:text-xs focus:ring-2 ring-offset-2 ring-violet-600 duration-300 focus:border-white;
}
</style>
