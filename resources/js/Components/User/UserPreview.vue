<template>
  <UIBox class="col-span-12 md:col-span-2">Picture</UIBox>
  <UIBox class="col-span-12 md:col-span-10">
    <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
      <div>{{ profile.username }} (<UserAge :profile="profile" />)</div>
      <div><slot name="buttons"></slot></div>
    </div>
  </UIBox>
</template>

<script setup>
import UIBox from '@/Components/UI/UIBox.vue'
import UserAge from '@/Components/User/UserAge.vue'

defineProps({
  profile: Object
})
</script>
