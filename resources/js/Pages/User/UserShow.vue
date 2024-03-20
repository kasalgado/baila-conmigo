<template>
    <h3>Show user:</h3>
    <div><UserNames :user="user" /></div>
    <div>{{ age }}</div>
    <div>
      <Link :href="route('user.edit', user.id)" as="button">Edit</Link>
      <Link :href="route('user.destroy', user.id)" method="delete" as="button">Delete</Link>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'
import UserNames from '@/Components/UserNames.vue'

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
