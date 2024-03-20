<template>
    <div class="text-2xl">{{ user.username }} (<UserAge :user="user" />)</div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <UIBox class="items-center">
            <div class="text-center w-full">Picture</div>
        </UIBox>
        <UIBox>
            <div class="text-2xl">{{ user.firstname }}</div>
            <div class="text-2xl">{{ user.lastname }}</div>
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
</template>

<script setup>
import UIBox from '@/Components/UI/UIBox.vue'
import UserAge from '@/Components/UserAge.vue'

defineProps({
  user: Object,
  address: Object
})
</script>
