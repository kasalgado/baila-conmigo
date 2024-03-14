<template>
  <div><Link :href="`/contact/${contact.id}`" method="delete" as="button">Delete</Link></div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  contact: Object
})
</script>
