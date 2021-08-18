<template>
  <team-component />
</template>
<script>
import TeamComponent from '@/components/Teams/Team/TeamComponent'
export default {

  components: { TeamComponent },
  middleware: 'auth'
}
</script>
