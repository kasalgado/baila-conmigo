<template>
    <div class="text-2xl">{{ profile.username }} (<UserAge :profile="profile" />)</div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <UIBox class="items-center">
            <div class="text-center w-full">Picture</div>
        </UIBox>
        <UIBox>
            <div class="text-2xl">{{ profile.firstname }}</div>
            <div class="text-2xl">{{ profile.lastname }}</div>
            <div class="text-gray-500">{{ address.street }}</div>
            <div class="text-gray-500">{{ address.sector }}</div>
        </UIBox>
    </div>
    <UIBox class="mt-4">
        <div>About me</div>
    </UIBox>
    <UIBox class="mt-4">
        <div>Dance Preferences</div>
    </UIBox>
    <button v-if="fromUser" class="btn-primary mt-2">
        <Link :href="route('message.create', {'from_user_id': fromUser.id, 'to_user_id': profile.id})" as="button">
            Mensaje
        </Link>
    </button>
</template>

<script setup>
import UIBox from '@/Components/UI/UIBox.vue'
import UserAge from '@/Components/User/UserAge.vue'
import { Link } from '@inertiajs/vue3'

defineProps({
  profile: Object,
  address: Object,
  fromUser: Object
})
</script>
