<template>
  <form @submit.prevent="login">
    <div class="md:w-1/2 mx-auto">
      <label class="block">
        <span class="text-gray-700">Email:</span>
        <input class="input-primary" v-model="form.email" type="email" name="email" />
        <span class="text-sm text-red-800" v-if="form.errors.email">{{ form.errors.email }}</span>
      </label>
      <label class="block mt-4">
        <span class="text-gray-700">Clave:</span>
        <input class="input-primary" v-model="form.password" type="password" name="password" />
        <span class="text-sm text-red-800" v-if="form.errors.password">{{ form.errors.password }}</span>
      </label>
      <div class="mt-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full" type="submit">Ingresar</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  email: null,
  password: null
})
const login = () => form.post(route('login.store'))
</script>
