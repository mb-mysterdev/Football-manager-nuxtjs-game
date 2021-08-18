<template>
  <div class="mt-5">
    <FmCalendar />
  </div>
</template>

<script>
import FmCalendar from '@/components/FmCalendar'
export default {

  name: 'Calendar',
  components: { FmCalendar },
  middleware: 'auth'
}
</script>

<style scoped>

</style>
