<template>
  <button>
    <Link :href="route" as="button" class="btn-success">Favorito</Link>
  </button>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  route: String
})
</script>
