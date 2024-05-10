<template>
  <h1 class="text-3xl mb-4">Tus favoritos</h1>
  <section>
    Filters
  </section>
  <div v-for="favorite in favorites" :key="favorite.id" class="grid grid-cols-12 gap-2 mb-4 pb-4">
    <UserPreview :profile="favorite.fav_user_id">
      <UIBtnFavorite :route="route('favorite.store', favorite.id)" />
    </UserPreview>
  </div>
</template>

<script setup>
import UserPreview from '@/Components/User/UserPreview.vue'
import UIBtnFavorite from '@/Components/UI/UIBtnFavorite.vue'

defineProps({
  favorites: Array
})
</script>
