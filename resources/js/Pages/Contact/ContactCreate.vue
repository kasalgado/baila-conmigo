<template>
  <form @submit.prevent="create">
    <div class="grid grid-cols-1 gap-6">
      <label class="block">
        <span class="text-gray-700">Nombres:</span>
        <input class="input-primary" v-model="form.firstname" type="text" name="firstname" />
        <span class="text-sm text-red-800" v-if="form.errors.firstname">{{ form.errors.firstname }}</span>
      </label>
      <label class="block">
        <span class="text-gray-700">Apellidos:</span>
        <input class="input-primary" v-model="form.lastname" type="text" name="lastname" />
        <span class="text-sm text-red-800" v-if="form.errors.lastname">{{ form.errors.lastname }}</span>
      </label>
      <label class="block">
        <span class="text-gray-700">Email:</span>
        <input class="input-primary" v-model="form.email" type="email" name="email" />
        <span class="text-sm text-red-800" v-if="form.errors.email">{{ form.errors.email }}</span>
      </label>
      <label class="block">
        <span class="text-gray-700">Message:</span>
        <textarea class="input-primary" v-model="form.message"></textarea>
        <span class="text-sm text-red-800" v-if="form.errors.message">{{ form.errors.message }}</span>
      </label>
      <div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full" type="submit">Enviar</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  firstname: null,
  lastname: null,
  email: null,
  message: null
})
const create = () => form.post(route('contact.store'))
</script>
