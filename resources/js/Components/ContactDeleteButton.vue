<template>
  <button class="btn-delete"><Link :href="route('contact.destroy', contact.id)" method="delete" as="button">Delete</Link></button>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  contact: Object
})
</script>
