<template>
  <div class="text-2xl text-gray-500">Tus mensajes:</div>
  <div>
    <Link :href="route('message.index')">Recibidos</Link> |
    <Link :href="route('message.index', {'type': 'sent'})">Enviados</Link>
  </div>
  <UIBox v-for="message in messages" :key="message.id" class="mb-4">
    <Link :href="route('profile.show', message.from_user_id.id)" as="button">
      <span class="font-bold text-gray-500">{{ message.from_user_id.username }}</span>
    </Link>
    <div class="text-gray-500 text-sm">{{ formatDate(message.created_at) }}</div>
    <div>{{ message.message }}</div>
    <Link :href="route('message.show', message.id)" as="button">Abrir</Link> |
    <Link :href="route('message.destroy', message.id)" as="button" method="delete">Borrar</Link>
  </UIBox>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import UIBox from '@/Components/UI/UIBox.vue'
import { formatDate } from '@/Composables/formatDate'

defineProps({
  messages: Array
})
</script>
