<template>
   <div class="container">
    <section class="bg-cover dark:bg-gray-900" style="background-image: url(https://imgs.search.brave.com/g38pKRRt8lnO_lvB_T8znh1Wj5WdBgUNZSN6Q6AuW1o/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly93YWxs/cGFwZXJjYXZlLmNv/bS93cC93cDI1NDEz/NTIuanBn)">
  <div class="bg-cover dark:bg-gray-900" style="background-image: url(https://imgs.search.brave.com/g38pKRRt8lnO_lvB_T8znh1Wj5WdBgUNZSN6Q6AuW1o/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly93YWxs/cGFwZXJjYXZlLmNv/bS93cC93cDI1NDEz/NTIuanBn)">
    <div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center">
      <div class="bg-white p-20 rounded-md shadow-lg shadow-blue-500 mx-auto max-w-xl text-center">
        <h1 class="text-3xl font-extrabold sm:text-5xl">
          A good barber
          <strong class="font-extrabold red-bag sm:block">
            is a good friend...
          </strong>
        </h1>

        <p class=" text-gray-700 mt-4 sm:text-xl sm:leading-relaxed">
          Best in Town ✂️
        </p>

        <div class="mt-8 flex flex-wrap justify-center gap-4">
          <a class="  text-blue-600  block w-full rounded red-bag px-12 py-3 text-sm font-medium shadow-lg hover:red-bag focus:outline-none focus:ring active:red-bag sm:w-auto"
            href="/login">
            Get Started
          </a>

          
        </div>
      </div>
    </div>
  </div>
    </section>
   </div>
</template>
<script>
// import LoginForm from "@/components/Login.vue";
import axios from 'axios';

export default {
  data(){
   return{
    reference: ''
    } 
  
  },
  mounted(){
    // if(localStorage.getItem('reference') !== null){
    //   this.$router.push('/calendrier')
    // }
  },
  methods: {
    
}
}
</script>

<style>

</style>