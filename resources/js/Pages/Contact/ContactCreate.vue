<template>
  <div>
    <form @submit.prevent="create">
      <div>
        <label>Firstname</label>
        <input v-model="form.firstname" type="text" name="firstname" />
      </div>
      <div>
        <label>Lastname</label>
        <input v-model="form.lastname" type="text" name="lastname" />
      </div>
      <div>
        <label>Email</label>
        <input v-model="form.email" type="text" name="email" />
      </div>
      <div>
        <label>Message</label>
        <input v-model="form.message" type="textarea" name="message" />
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
const create = () => form.post('/contact')
</script>
