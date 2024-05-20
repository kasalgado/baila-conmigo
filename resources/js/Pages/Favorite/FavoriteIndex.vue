<template>
  <h1 class="text-3xl mb-4">Tus favoritos</h1>
  <section><IndexFilter /></section>
  <div v-for="favorite in favorites" :key="favorite.id" class="grid grid-cols-12 gap-2 mb-4 pb-4">
    <UserPreview :profile="favorite.fav_user_id">
      <template v-slot:buttons>
        <UIBtnDelete :route="route('favorite.destroy', favorite.id)" />
      </template>
    </UserPreview>
  </div>
</template>

<script setup>
import UserPreview from '@/Components/User/UserPreview.vue'
import UIBtnDelete from '@/Components/UI/UIBtnDelete.vue'
import IndexFilter from '@/Components/Favorite/IndexFilter.vue'

defineProps({
  favorites: Array
})
</script>
