<template>
  <div class="text-2xl">Results</div>
  <div>Name: {{ name }}</div>
  <div>Minimum: {{ minimum }}</div>
  <div>Maximum: {{ maximum }}</div>
</template>

<script setup>
defineProps({
  name: String,
  minimum: Number,
  maximum: Number
})
</script>
