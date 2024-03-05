<template>
    <Link href="/">Home</Link> | <Link href="/profile">Profile</Link>
    <div>Logged time: {{ timer }}</div>
    <slot></slot>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'

const timer = ref(0)
setInterval(() => timer.value++, 1000)
</script>
