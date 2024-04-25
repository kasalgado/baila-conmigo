<template>
  <div v-for="favorite in favorites" :key="favorite.id" class="grid grid-cols-12 gap-2 mb-4 pb-4">
    <UserPreview :profile="favorite.fav_user_id" />
  </div>
</template>

<script setup>
import UserPreview from '@/Components/User/UserPreview.vue'

defineProps({
  favorites: Array
})
</script>
