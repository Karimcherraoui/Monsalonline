<template>

<div class="mainpage mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-lg">
      <h1 class="text-center text-2xl font-bold blue-txt sm:text-3xl">
        Get started today
      </h1>

      <p class="mx-auto mt-4 max-w-md text-center text-gray-500">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati sunt
        dolores deleniti inventore quaerat mollitia?
      </p>

      <div class="mt-6 mb-0 space-y-4 rounded-lg p-8 shadow-2xl">
        <p class="text-lg font-medium">Sign in to your account</p>

        <div>
          <label for="day" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Day</label>
          <div class="relative mt-1">
            <div>
              <input min="today"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                v-model="month" type="date">
            </div>
          </div>
        </div>

        <div v-if="show">
          <!-- {{ taken }} -->
          <label for="Hour" class="text-sm font-medium">Hour</label>
          <div class="relative mt-1" v-for="h in hour" v-bind:key="h">
            <!-- <select v-model="hourselected"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option value="" selected hidden>Choose Hour</option>
              <option v-for="h in hour">{{ h }}</option>
            </select> -->

            <div v-if="taken.hour.includes(h) && taken.client[taken.hour.indexOf(h)] == local" v-on:click="now(h)"
              class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg  p-4 bg-blue-200">
              {{ h }}
            </div>
            <div v-else-if="taken.hour.includes(h) && taken.client.includes(h) !== local" v-on:click="now(h)"
              class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg  p-4 bg-red-200">
              {{ h }}
            </div>
            <div v-if="!taken.hour.includes(h)" v-on:click="now(h)"
              class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg  p-4 bg-white">
              {{ h }}
            </div>
          </div>
        </div>

        <!-- <button v-on:click="now" class="block w-full rounded-lg blue-bag px-5 py-3 text-sm font-medium text-white">
test        </button> -->

      </div>
    </div>
  </div>

</template>


<script>
export default {
    name: "CalendrierInputs",

}
</script>
