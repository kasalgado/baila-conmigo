<template>
  <header class="border-b border-gray-200 bg-white">
    <div class="container mx-auto">
      <nav class="flex justify-between">
        <div class="flex justify-start">
          <div class="p-2">
            <Link :href="route('home')">Inicio</Link>
          </div>
          <div v-if="user" class="p-2">
            <Link :href="route('message.index')">Mensajes</Link>
          </div>
          <div v-if="user" class="p-2">
            <Link :href="route('search.index')">Buscar</Link>
          </div>
          <div v-if="user" class="p-2">
            <Link :href="route('profile.index')">Profil</Link>
          </div>
          <div class="p-2">
            <Link :href="route('contact.create')">Contacto</Link>
          </div>
          <div v-if="user && user.is_admin" class="p-2"> | </div>
          <div v-if="user && user.is_admin" class="p-2">
            <Link :href="route('user.index')">Usuarios</Link>
          </div>
          <div v-if="user && user.is_admin" class="p-2">
            <Link :href="route('contact.index')">Pendientes</Link>
          </div>
        </div>
        <div v-if="user" class="p-2">
          <Link :href="route('logout')" method="delete" as="button">Salir</Link>
        </div>
        <div v-else class="flex items-center gap-2">
          <Link :href="route('register.create')">Registrarse</Link>
          <Link :href="route('login')">Ingresar</Link>
        </div>
      </nav>
    </div>
  </header>

  <main class="container mx-auto p-4 w-full">
    <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
      {{ flashSuccess }}
    </div>
    <slot></slot>
  </main>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const page = usePage()
const flashSuccess = computed(
  () => page.props.flash.success
)
const user = computed(
  () => page.props.user
)
</script>
