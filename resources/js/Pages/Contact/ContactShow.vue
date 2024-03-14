<template>
  <div>
    <div>Firstname: {{ contact.firstname }}</div>
    <div>Lastname: {{ contact.lastname }}</div>
    <div>Email: {{ contact.email }}</div>
    <div>Message: {{ contact.message }}</div>
    <ContactDeleteButton :contact="contact" />
  </div>
</template>

<script setup>
import ContactDeleteButton from '@/Components/ContactDeleteButton.vue'

defineProps({
  contact: Object
})
</script>
