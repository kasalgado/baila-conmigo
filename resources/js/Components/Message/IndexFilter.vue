<template>
  <form>
    <div class="mt-4 mb-4 flex flex-wrap gap-2">
      <div class="flex flex-nowrap items-center gap-2">
        <input type="radio" id="to_user_id" value="to_user_id" v-model="filterForm.action" checked="checked" />
        <label for="received">Recibidos</label>
        <input type="radio" id="from_user_id" value="from_user_id" v-model="filterForm.action" />
        <label for="sent">Enviados</label>
      </div>
    </div>
  </form>
</template>

<script setup>
import { reactive, watch } from 'vue'
import { router } from '@inertiajs/vue3'

const filterForm = reactive({
  action: String
})

watch(
  filterForm, () => router.get(
    route('message.index'),
    filterForm,
    {
      preserveState: true,
      preserveScroll: true
    }
  )
)
</script>
