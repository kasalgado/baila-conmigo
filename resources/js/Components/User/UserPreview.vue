<template>
  <UIBox class="col-span-12 md:col-span-2">Picture</UIBox>
  <UIBox class="col-span-12 md:col-span-10">
    {{ profile.username }} (<UserAge :profile="profile" />)
  </UIBox>
</template>

<script setup>
import UIBox from '@/Components/UI/UIBox.vue'
import UserAge from '@/Components/User/UserAge.vue'

defineProps({
  profile: Object
})
</script>
