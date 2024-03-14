<template>
    <h3>Show user:</h3>
    <div><UserNames :user="user" /></div>
    <div>{{ user.birthday }}</div>
    <div>
      <Link :href="route('user.edit', user.id)" as="button">Edit</Link>
      <Link :href="route('user.destroy', user.id)" method="delete" as="button">Delete</Link>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import UserNames from '@/Components/UserNames.vue'

defineProps({
  user: Object
})
</script>
