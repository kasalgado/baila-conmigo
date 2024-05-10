<template>
  <div>
    <div>Firstname: {{ contact.firstname }}</div>
    <div>Lastname: {{ contact.lastname }}</div>
    <div>Email: {{ contact.email }}</div>
    <div>Message: {{ contact.message }}</div>
    <UIBtnDelete :route="route('contact.destroy', contact.id)" />
  </div>
</template>

<script setup>
import UIBtnDelete from '@/Components/UI/UIBtnDelete.vue'

defineProps({
  contact: Object
})
</script>
