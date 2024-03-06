<template>
  <h3>List of users:</h3>
  <div v-for="user in users" :key="user.id">
    <Link :href="`/user/${user.id}`">{{ user.firstname }} {{ user.lastname }}</Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  users: Array
})
</script>
