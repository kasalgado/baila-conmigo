<template>
  <h3>Contact messages:</h3>
  <div v-for="contact in contacts" :key="contact.id">
    <Link :href="`/contact/${contact.id}`">
      <div>{{ contact.id }} | {{ contact.message }}</div>
      <div><Link :href="`/contact/${contact.id}`" method="delete" as="button">Delete</Link></div>
    </Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  contacts: Array
})
</script>
