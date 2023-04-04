<template>
  <section class="bg-cover dark:bg-gray-900" style="background-image: url(https://imgs.search.brave.com/g38pKRRt8lnO_lvB_T8znh1Wj5WdBgUNZSN6Q6AuW1o/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly93YWxs/cGFwZXJjYXZlLmNv/bS93cC93cDI1NDEz/NTIuanBn)">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-white dark:text-white">
          <img class="w-8 h-8 mr-2" src="https://imgs.search.brave.com/GCgItTxdSuRVfgcLXbOsQvxzyLeE4_zqBsh0UDAXFP8/rs:fit:880:1200:1/g:ce/aHR0cHM6Ly93ZWJz/dG9ja3Jldmlldy5u/ZXQvaW1hZ2VzL2Jh/cmJlci1jbGlwYXJ0/LXRyYW5zcGFyZW50/LTE0LnBuZw" alt="logo">
          MonSalonLine    
      </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Sign in to your account
              </h1>
              <form class="space-y-4 md:space-y-6" action="#">
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Reference </label>
                      <input type="text" name="reference" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Reference Code" required="">
                  </div>
           
                  <div class="flex items-center justify-between">
                      <div class="flex items-start">
                      </div>
                  </div>
                  <button type="submit" class="w-full text-white bg-green-700 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Don’t have an account yet? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>
</template>

<script>
export default {
    name: "LoginForm",

}
</script>

<style>

</style>