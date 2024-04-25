<template>
  <div class="grid grid-cols-12 gap-4">
    <form @submit.prevent="filter" class="col-span-12 md:col-span-2 md:border-r md:pr-2">
      <div class="grid grid-cols-1 gap-2">
        <div class="text-2xl">Buscar:</div>
        <label class="block">
          <span class="text-blue-800">Usuario:</span>
          <input class="input-primary" v-model="form.username" type="text" username="name" />
          <span class="text-sm text-red-800" v-if="form.errors.username">{{ form.errors.username }}</span>
        </label>
        <div>
          <label class="text-blue-800">Edad: {{ form.minimum }} - {{ form.maximum }}</label>
          <div class="mb-2">
            <span>min:</span> <input
              v-model.number="form.minimum"
              class="align-middle bg-gray-200 rounded-lg appearance-none cursor-pointer w-full"
              type="range"
              min="18"
              max="99"
              step="1"
              ref="minimum" />
          </div>
          <div class="align-middle">
            <span>max:</span> <input
              v-model.number="form.maximum"
              class="align-middle bg-gray-200 rounded-lg appearance-none cursor-pointer w-full"
              type="range"
              min="18"
              max="99"
              step="1"
              ref="maximum" />
          </div>
        </div>
        <div>
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full" type="submit">Buscar</button>
        </div>
        <div>
          <button class="text-center w-full text-gray-600 font-bold" type="reset" @click="clear">Resetear</button>
        </div>
      </div>
    </form>
    <div class="col-span-12 md:col-span-10">
      <div v-for="profile in profiles.data" :key="profile.id" class="grid grid-cols-12 gap-2 mb-4 pb-4">
        <UserPreview :profile="profile" />
      </div>
    </div>
  </div>
  <div v-if="profiles.data.length" class="w-full flex justify-center mt-4 mb-4">
    <UIPagination :links="profiles.links" />
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import UIPagination from '@/Components/UI/UIPagination.vue'
import UserPreview from '@/Components/User/UserPreview.vue'

const props = defineProps({
  profiles: Object,
  filters: Object
})

const minimum = ref(18)
const maximum = ref(99)

const form = useForm({
  username: props.filters.username ?? null,
  minimum: props.filters.minimum ?? minimum,
  maximum: props.filters.maximum ?? maximum
})

const filter = () => {
  form.get('search'), {
    preserveState: true,
    preserveScroll: true
  }
}

const clear = () => {
  form.username = null,
  form.minimum = 18,
  form.maximum = 99,
  filter()
}
</script>
