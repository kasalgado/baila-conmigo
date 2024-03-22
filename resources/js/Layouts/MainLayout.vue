<template>
  <header class="border-b border-gray-200 bg-white">
    <div class="container mx-auto">
      <nav class="flex justify-between">
        <div class="flex justify-start">
          <div class="p-2">
            <Link href="/">Home</Link>
          </div>
          <div class="p-2">
            <Link href="/search">Search</Link>
          </div>
          <div class="p-2">
            <Link href="/profile">Profile</Link>
          </div>
          <div class="p-2">
            <Link :href="route('user.index')">Users</Link>
          </div>
          <div class="p-2">
            <Link :href="route('contact.create')">Contact</Link>
          </div>
          <div class="p-2">
            <Link :href="route('contact.index')">Messages</Link>
          </div>
        </div>
        <div class="p-2">
          Logged time: {{ timer }}
        </div>
      </nav>
    </div>
  </header>

  <main class="container mx-auto p-4">
    <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
      {{ flashSuccess }}
    </div>
    <slot></slot>
  </main>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { ref, computed } from 'vue'

const timer = ref(0)
setInterval(() => timer.value++, 1000)

const page = usePage()
const flashSuccess = computed(
  () => page.props.flash.success
)
</script>
