<template>
  <form @submit.prevent="create">
    <div class="md:w-1/2 mx-auto">
      <label class="block">
        <span class="text-gray-700">Dirección:</span>
        <input class="input-primary" v-model="form.street" type="text" name="street" />
        <span class="text-sm text-red-800" v-if="form.errors.street">{{ form.errors.street }}</span>
      </label>
      <label class="block">
        <span class="text-gray-700">Sector:</span>
        <input class="input-primary" v-model="form.sector" type="text" name="sector" />
        <span class="text-sm text-red-800" v-if="form.errors.sector">{{ form.errors.sector }}</span>
      </label>
      <div class="mt-4">
        <input v-model="form.user_id" name="user_id" type="hidden" />
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full" type="submit">Crear</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  user: Object
})

const form = useForm({
  street: null,
  sector: null,
  user_id: props.user.id
})
const create = () => form.post(route('address.store'))
</script>
