
<template>
  <div class="flex items-center justify-center h-screen" v-if="show">
    <p class="font-black">NOTHING TO SHOW</p>
  </div>
  <div v-if="!show" class="mx-40 my-28	 overflow-x-auto">
    <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
      <thead>
        <tr>
          <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
            Day
          </th>
          <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
            Date
          </th>
          <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
            Situation
          </th>
          <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
            Action
          </th>
        </tr>
      </thead>

      <tbody v-for="d in data" class="divide-y divide-gray-200">
        <tr>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ d.jour }}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ d.date }}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ d.statut }}</td>
          <td class="whitespace-nowrap px-4 py-2" v-on:click="cancel(d.id)">
            <a class="inline-block rounded bg-red-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
              Cancel
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <foot></foot>
</template>
<script>
import axios from 'axios'
export default {
  data() {
    return {
      id: '',
      data: [],
      show: false
    }
  },
  mounted() {
    // if(localStorage.getItem('key') == null){
    //   this.$router.push('/login')
    // }
    this.read()
  },
  components: {
    navbar,
    foot
  },
  methods: {
    read() {
      axios.post('http://localhost/wiSalonline/public/FromKeyToId', [localStorage.getItem('key')])
        .then(response => {
          this.id = response.data[0].id
          axios.post('http://localhost/wiSalonline/public/api/RRappointments', [this.id])
            .then(res => {
              this.data = res.data
              if (this.data.length === 0) {
                this.show = true
              }
            })
        })
    },
    cancel(par) {
      axios.post('http://localhost/wiSalonline/public/api/Dappointments', [par])
        .then(this.read())
    }
  }
}
</script>
<style scoped>
</style>
Footer
© 2023 GitHub, Inc.
Footer navigation
Terms
Privacy
Security
Status
Docs
Contact GitHub
Pricing
API
Training
Blog
About
wiSalonline_front/myappointment.vue at master · marouaneaitelhaj/wiSalonline_front