<template>
  <div class="text-2xl">{{ from_user.username }} (<UserAge :user="from_user" />)</div>
  <div class="text-gray-500">{{ formated }}</div>
  <div class="grid grid-cols-12 gap-4 mt-2 mb-2">
    <UIBox class="items-center col-span-12 md:col-span-2">
      <div class="text-center w-full">Picture</div>
    </UIBox>
    <UIBox class="col-span-12 md:col-span-10">
      <div>{{ message.message }}</div>
    </UIBox>
  </div>
  <DeleteButton :route="route('message.destroy', message.id)" />
</template>

<script setup>
import UserAge from '@/Components/UserAge.vue'
import UIBox from '@/Components/UI/UIBox.vue'
import { formatDate } from '@/Composables/formatDate'
import DeleteButton from '@/Components/UI/DeleteButton.vue'

const props = defineProps({
  message: Object,
  from_user: Object
})
const { formated } = formatDate(props.message.created_at)
</script>
