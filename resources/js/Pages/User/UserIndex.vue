<template>
  <h3>List of users:</h3>
  <UIBox v-for="user in users" :key="user.id" class="mb-4">
    <Link :href="route('user.show', user.id)">
      <UserNames :user="user" />
    </Link>
  </UIBox>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import UserNames from '@/Components/User/UserNames.vue'
import UIBox from '@/Components/UI/UIBox.vue'

defineProps({
  users: Array
})
</script>
