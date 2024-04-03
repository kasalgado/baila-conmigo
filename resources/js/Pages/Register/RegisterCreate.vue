<template>
  <form @submit.prevent="register">
    <div class="md:w-1/2 mx-auto">
      <label class="block">
        <span class="text-gray-700">Usuario:</span>
        <input class="input-primary" v-model="form.username" type="text" name="username" />
        <span class="text-sm text-red-800" v-if="form.errors.username">{{ form.errors.username }}</span>
      </label>
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
        <span class="text-gray-700">Nacido el:</span>
        <input class="input-primary" v-model="form.birthday" type="date" name="birthday" />
        <span class="text-sm text-red-800" v-if="form.errors.birthday">{{ form.errors.birthday }}</span>
      </label>
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
      <label class="block mt-4">
        <span class="text-gray-700">Repetir Clave:</span>
        <input class="input-primary" v-model="form.password_confirmation" type="password" name="password_confirmation" />
      </label>
      <div class="mt-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full" type="submit">Registrar</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  username: null,
  firstname: null,
  lastname: null,
  birthday: Date,
  email: null,
  password: null,
  password_confirmation: null
})
const register = () => form.post(route('register.store'))
</script>
