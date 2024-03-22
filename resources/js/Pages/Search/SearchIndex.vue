<template>
  <form @submit.prevent="create">
    <div class="grid grid-cols-1 gap-6">
      <label class="block">
        <span class="text-gray-500 font-bold">Nombre:</span>
        <input class="input-primary" v-model="form.name" type="text" name="name" />
        <span class="text-sm text-red-800" v-if="form.errors.name">{{ form.errors.name }}</span>
      </label>
      <div>
        <label class="text-gray-500 font-bold">Edad: {{ form.minimum }} - {{ form.maximum }}</label>
        <div class="mb-2">
          <span>min:</span> <input
            v-model.number="form.minimum"
            class="align-middle bg-gray-200 rounded-lg appearance-none cursor-pointer"
            type="range"
            min="18"
            max="99"
            step="1"
            name="minimum" />
        </div>
        <div class="align-middle">
          <span>max:</span> <input
            v-model.number="form.maximum"
            class="align-middle bg-gray-200 rounded-lg appearance-none cursor-pointer"
            type="range"
            min="18"
            max="99"
            step="1"
            name="maximum"/>
        </div>
      </div>
      <div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full" type="submit">Buscar</button>
      </div>
    </div>
  </form>
</template>

<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'

const minimum = ref(1)
const maximum = ref(99)
const form = useForm({
  name: null,
  minimum,
  maximum
})
const create = () => form.post('/search/list')
</script>
