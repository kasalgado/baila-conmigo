<template>
  <form @submit.prevent="update">
    <div class="grid grid-cols-1 gap-6">
      <label class="block">
        <span class="text-gray-700">Nombres:</span>
        <input v-model="form.firstname" class="input-primary" type="text" name="firstname" />
        <span class="text-sm text-red-800" v-if="form.errors.firstname">{{ form.errors.firstname }}</span>
      </label>
      <label class="block">
        <span class="text-gray-700">Apellidos:</span>
        <input v-model="form.lastname" class="input-primary" type="text" name="lastname" />
        <span class="text-sm text-red-800" v-if="form.errors.lastname">{{ form.errors.lastname }}</span>
      </label>
      <label class="block">
        <span class="text-gray-700">Fecha de Nacimiento:</span>
        <input v-model="form.birthday" class="input-primary" type="text" name="birthday" />
        <span class="text-sm text-red-800" v-if="form.errors.birthday">{{ form.errors.birthdas }}</span>
      </label>
      <div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full" type="submit">Enviar</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  profile: Object
})

const form = useForm({
  firstname: props.profile.firstname,
  lastname: props.profile.lastname,
  birthday: props.profile.birthday
})
const update = () => form.put(route('user.update', props.user.id))
</script>
