<template>
  <div class="text-2xl">{{ message.from_user_id.username }} (<UserAge :user="message.from_user_id" />)</div>
  <div class="text-gray-500">{{ formated }}</div>
  <div class="grid grid-cols-12 gap-4 mt-2 mb-2">
    <UIBox class="items-center col-span-12 md:col-span-2">
      <div class="text-center w-full">Picture</div>
    </UIBox>
    <UIBox class="col-span-12 md:col-span-10">
      <div>{{ message.message }}</div>
    </UIBox>
  </div>
  <Link v-if="answer" :href="route('message.create', {'from_user_id': message.to_user_id.id, 'to_user_id': message.from_user_id.id})" as="button">
    Responder
  </Link>
  <DeleteButton :route="route('message.destroy', message.id)" />
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import UserAge from '@/Components/UserAge.vue'
import UIBox from '@/Components/UI/UIBox.vue'
import { formatDate } from '@/Composables/formatDate'
import DeleteButton from '@/Components/UI/DeleteButton.vue'
import { computed } from 'vue'

const props = defineProps({
  message: Object,
  user: Object
})
const { formated } = formatDate(props.message.created_at)
const answer = computed(
  () => props.user.id !== props.message.from_user_id.id
)
</script>
