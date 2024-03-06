<template>
    <h3>Show user:</h3>
    <div>Firstname: {{ user.firstname }}</div>
    <div>Lastname: {{ user.lastname }}</div>
    <div>Birthday: {{ user.birthday }}</div>
</template>

<script setup>
defineProps({
  user: Object
})
</script>
