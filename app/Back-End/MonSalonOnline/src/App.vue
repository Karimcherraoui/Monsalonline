

<template>
<div class ="flex flex-col min-h-screen font-roboto " >

    <headerComp />


    <RouterView />

</div>
 
</template>

<script setup>
import { RouterLink, RouterView } from 'vue-router';
import headerComp from "./components/headerComp.vue";
import Signup from './views/Signup.vue';
import Login from './views/Login.vue';




</script>

<style lang="scss" scoped>


</style>
