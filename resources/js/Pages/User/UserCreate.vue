<template>
  <form>
    <div>
      <div>
        <label>Firstname</label>
        <input v-model="form.firstname" type="text" />
      </div>
      <div>
        <label>Lastname</label>
        <input v-model="form.lastname" type="text" />
      </div>
      <div>
        <label>Birthday</label>
        <input v-model="form.birthday" type="date" />
      </div>
      <div>
        <button type="submit">Submit</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { reactive } from 'vue'

const form = reactive({
  firstname: null,
  lastname: null,
  birthday: null
})
</script>
