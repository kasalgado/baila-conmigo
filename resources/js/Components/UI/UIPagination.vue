<template>
  <div class="flex gap-1">
    <Link
      v-for="(link, index) in links"
      :key="index"
      :href="link.url"
      :class="{'bg-indigo-500 text-gray-300': link.active}"
      v-html="link.label"
      class="py-2 px-4 rounded-md" />
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  links: Array
})
</script>
