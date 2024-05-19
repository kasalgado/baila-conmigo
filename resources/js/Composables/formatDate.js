export function formatDate (dateAsString) {
  const date = new Date(dateAsString)

  return new Intl.DateTimeFormat('default', { dateStyle: 'full' }).format(date)
}
