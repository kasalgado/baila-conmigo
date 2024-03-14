<template>
  <h3>List of users:</h3>
  <div v-for="user in users" :key="user.id">
    <Link :href="route('user.show', user.id)">
      <UserNames :user="user" />
    </Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import UserNames from '@/Components/UserNames.vue'

defineProps({
  users: Array
})
</script>
