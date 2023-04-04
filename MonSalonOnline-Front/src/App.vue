<template>
  <div class="flex flex-col min-h-screen font-roboto">
    <headerComp />
    <RouterView />
  </div>
</template>

<script>
import { RouterLink, RouterView } from 'vue-router';
import headerComp from '@/components/headerComp.vue';
export default {
 components: {
    headerComp,
  },
};
</script>

<style lang="scss" scoped>
</style>
