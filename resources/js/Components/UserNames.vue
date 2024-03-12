<template>
  <span>{{ user.firstname }} {{ user.lastname }}</span>
</template>

<script setup>
defineProps({
  user: Object
})
</script>
