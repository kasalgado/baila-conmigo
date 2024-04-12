<template>
  <form @submit.prevent="create">
    <label class="block">
      <span class="text-gray-700">Mensaje:</span>
      <textarea class="input-primary" v-model="form.message" name="message" />
      <span class="text-sm text-red-800" v-if="form.errors.message">{{ form.errors.message }}</span>
    </label>
    <div class="mt-4">
      <input v-model="form.from_user_id" name="from_user_id" type="hidden" />
      <input v-model="form.to_user_id" name="to_user_id" type="hidden" />
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full" type="submit">Enviar</button>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  from_user_id: Object,
  to_user_id: Object
})

const form = useForm({
  from_user_id: props.from_user_id.id,
  to_user_id: props.to_user_id.id,
  message: null
})
const create = () => form.post(route('message.store'))
</script>
