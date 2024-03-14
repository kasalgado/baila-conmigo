<template>
  <Link href="/">Home</Link> | <Link href="/profile">Profile</Link> | <Link :href="route('user.index')">Users</Link> | <Link :href="route('contact.create')">Contact</Link> | <Link :href="route('contact.index')">Messages</Link>
  <div>Logged time: {{ timer }}</div>
  <div v-if="flashSuccess">
    {{ flashSuccess }}
  </div>
  <slot></slot>
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
