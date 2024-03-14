<template>
  <h3>Contact messages:</h3>
  <div v-for="contact in contacts" :key="contact.id">
    <Link :href="route('contact.show', contact.id)">
      <div>{{ contact.id }} | {{ contact.message }}</div>
      <ContactDeleteButton :contact="contact" />
    </Link>
  </div>
</template>

<script setup>
import ContactDeleteButton from '@/Components/ContactDeleteButton.vue'
import { Link } from '@inertiajs/vue3'

defineProps({
  contacts: Array
})
</script>
