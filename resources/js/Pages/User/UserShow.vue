<template>
    <h3>Show user:</h3>
    <div><UserNames :user="user" /></div>
    <div>{{ user.birthday }}</div>
</template>

<script setup>
import UserNames from '@/Components/UserNames.vue'

defineProps({
  user: Object
})
</script>
