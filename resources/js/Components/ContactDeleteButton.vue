<template>
  <div><Link :href="route('contact.destroy', contact.id)" method="delete" as="button">Delete</Link></div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  contact: Object
})
</script>
