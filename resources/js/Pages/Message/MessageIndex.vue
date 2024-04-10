<template>
  <div class="text-2xl text-gray-500">Tus mensajes:</div>
  <UIBox v-for="message in messages" :key="message.id" class="mb-4">
    <Link :href="route('profile.show', message.from_user.id)" as="button">
      <span class="font-bold text-gray-500">{{ message.from_user.username }}</span>
    </Link>
    <div>{{ message.message.message }}</div>
    <Link :href="route('message.show', message.message.id)" as="button">Abrir</Link> |
    <Link :href="route('message.destroy', message.message.id)" as="button" method="delete">Borrar</Link>
  </UIBox>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import UIBox from '@/Components/UI/UIBox.vue'

defineProps({
  messages: Array
})
</script>
