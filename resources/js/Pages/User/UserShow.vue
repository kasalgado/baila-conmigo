<template>
    <div class="text-2xl">User</div>
    <UIBox class="mb-2">
      <div>Usuario: {{ profile.username }}</div>
      <div>Nombres: <UserNames :user="profile" /></div>
      <div>Edad: <AgeShow :profile="profile" /></div>
      <div>Dirección: {{ address.street }}</div>
    </UIBox>
    <div>
      <Link :href="route('profile.show', profile.id)" as="button" class="btn-primary me-2">Profile</Link>
      <Link :href="route('user.edit', profile.id)" as="button" class="btn-primary me-2">Edit</Link>
      <Link :href="route('user.destroy', profile.id)" method="delete" as="button" class="btn-delete">Delete</Link>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import UserNames from '@/Components/UserNames.vue'
import AgeShow from '@/Components/AgeShow.vue'
import UIBox from '@/Components/UI/UIBox.vue'

defineProps({
  profile: Object,
  address: Object
})
</script>
