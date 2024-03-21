<template>
    <div class="text-2xl">User</div>
    <UIBox class="mb-2">
      <div>Usuario: {{ user.username }}</div>
      <div>Nombres: <UserNames :user="user" /></div>
      <div>Edad: <UserAge :user="user" /></div>
      <div>Dirección: {{ address.street }}</div>
    </UIBox>
    <div>
      <Link :href="route('profile.show', user.id)" as="button" class="btn-primary me-2">Profile</Link>
      <Link :href="route('user.edit', user.id)" as="button" class="btn-primary me-2">Edit</Link>
      <Link :href="route('user.destroy', user.id)" method="delete" as="button" class="btn-delete">Delete</Link>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import UserNames from '@/Components/UserNames.vue'
import UserAge from '@/Components/UserAge.vue'
import UIBox from '@/Components/UI/UIBox.vue'

defineProps({
  user: Object,
  address: Object
})
</script>
