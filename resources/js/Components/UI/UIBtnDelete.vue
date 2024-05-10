<template>
  <button class="btn-delete">
    <Link :href="route" method="delete" as="button">Borrar</Link>
  </button>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  route: String
})
</script>
