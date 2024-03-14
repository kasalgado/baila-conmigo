<template>
  <div>
    <form @submit.prevent="create">
      <div>
        <label>Firstname</label>
        <input v-model="form.firstname" type="text" name="firstname" />
        <div v-if="form.errors.firstname">{{ form.errors.firstname }}</div>
      </div>
      <div>
        <label>Lastname</label>
        <input v-model="form.lastname" type="text" name="lastname" />
        <div v-if="form.errors.lastname">{{ form.errors.lastname }}</div>
      </div>
      <div>
        <label>Email</label>
        <input v-model="form.email" type="text" name="email" />
        <div v-if="form.errors.email">{{ form.errors.email }}</div>
      </div>
      <div>
        <label>Message</label>
        <input v-model="form.message" type="textarea" name="message" />
        <div v-if="form.errors.message">{{ form.errors.message }}</div>
      </div>
      <div>
        <button type="submit">Create</button>
      </div>
    </form>
  </div>
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
