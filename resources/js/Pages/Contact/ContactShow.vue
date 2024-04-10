<template>
  <div>
    <div>Firstname: {{ contact.firstname }}</div>
    <div>Lastname: {{ contact.lastname }}</div>
    <div>Email: {{ contact.email }}</div>
    <div>Message: {{ contact.message }}</div>
    <DeleteButton :route="route('contact.destroy', contact.id)" />
  </div>
</template>

<script setup>
import DeleteButton from '@/Components/UI/DeleteButton.vue'

defineProps({
  contact: Object
})
</script>
