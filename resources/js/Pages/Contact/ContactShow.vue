<template>
  <div>
    <div>Firstname: {{ contact.firstname }}</div>
    <div>Lastname: {{ contact.lastname }}</div>
    <div>Email: {{ contact.email }}</div>
    <div>Message: {{ contact.message }}</div>
  </div>
</template>

<script setup>
defineProps({
  contact: Object
})
</script>
