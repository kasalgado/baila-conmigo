<template>
  <span>{{ age }}</span>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  profile: Object
})

const age = computed(function () {
  const currentDate = new Date()
  const birthday = new Date(props.profile.birthday)
  const difference = currentDate - birthday

  return Math.floor(difference / 31557600000)
})
</script>
