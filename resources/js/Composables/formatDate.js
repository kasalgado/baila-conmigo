import { computed } from 'vue'

export const formatDate = (dateAsString) => {
  const formated = computed(() => {
    const date = new Date(dateAsString)

    return new Intl.DateTimeFormat('default', { dateStyle: 'full' }).format(date)
  })

  return { formated }
}
