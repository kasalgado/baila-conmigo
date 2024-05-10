<template>
  <div class="text-2xl">Contact messages</div>
  <UIBox v-for="contact in contacts" :key="contact.id" class="mb-4">
    <Link :href="route('contact.show', contact.id)">
      <div>{{ contact.message }}</div>
      <UIBtnDelete :route="route('contact.destroy', contact.id)" />
    </Link>
  </UIBox>
</template>

<script setup>
import UIBtnDelete from '@/Components/UI/UIBtnDelete.vue'
import { Link } from '@inertiajs/vue3'
import UIBox from '@/Components/UI/UIBox.vue'

defineProps({
  contacts: Array
})
</script>
