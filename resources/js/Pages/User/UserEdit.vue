<template>
  <form @submit.prevent="update">
    <div>
      <div>
        <label>Firstname</label>
        <input v-model="form.firstname" type="text" />
        <div v-if="form.errors.firstname">{{ form.errors.firstname }}</div>
      </div>
      <div>
        <label>Lastname</label>
        <input v-model="form.lastname" type="text" />
        <div v-if="form.errors.lastname">{{ form.errors.lastname }}</div>
      </div>
      <div>
        <label>Birthday</label>
        <input v-model="form.birthday" type="text" />
        <div v-if="form.errors.birthday">{{ form.errors.birthday }}</div>
      </div>
      <div>
        <button type="submit">Submit</button>
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
  firstname: props.user.firstname,
  lastname: props.user.lastname,
  birthday: props.user.birthday
})
const update = () => form.put(route('user.update', props.user.id))
</script>
