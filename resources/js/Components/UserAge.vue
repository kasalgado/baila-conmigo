<template>
  <span>{{ age }}</span>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  user: Object
})

const age = computed(function () {
  const currentDate = new Date()
  const birthday = new Date(props.user.birthday)
  const difference = currentDate - birthday

  return Math.floor(difference / 31557600000)
})
</script>
