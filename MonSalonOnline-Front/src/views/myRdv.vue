
<template>

<headerComp></headerComp>
<div class="bg-cover min-h-screen flex flex-col justify-center" style="background-image: url(https://imgs.search.brave.com/y9TPQ45kcUt6IYi-VxTfgVcww6ESSf5lNRYb9fWj4xU/rs:fit:1080:720:1/g:ce/aHR0cHM6Ly9pbWFn/ZXMudW5zcGxhc2gu/Y29tL3Bob3RvLTE1/MDM5NTE5MTQ4NzUt/NDUyMTYyYjBmM2Yx/P2l4bGliPXJiLTEu/Mi4xJnE9ODAmZm09/anBnJmNyb3A9ZW50/cm9weSZjcz10aW55/c3JnYiZ3PTEwODAm/Zml0PW1heCZpeGlk/PWV5SmhjSEJmYVdR/aU9qRXlNRGQ5)">
  
<div class="relative overflow-x-auto shadow-md sm:rounded-lg flex justify-center my-10 ">
    <table class="w-4/5 text-sm text-left text-gray-500 dark:text-gray-400 rounded-lg">
        <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
            <tr>
               
                <th scope="col" class="px-6 py-3">
                    Heure
                </th>
                <th scope="col" class="px-6 py-3">
                    Day
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody v-for="d in data" class="divide-y divide-gray-200" :key="d">
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
              
                <td class="px-6 py-4">
                  {{ d.heure }}
                </td>
                <td class="px-6 py-4">
                  {{ d.jour }}
                </td>
                <td class="px-6 py-4">
                  {{ d.date }}
                </td>
                <td class="px-6 py-4">
                    <a @click="remove(d)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Remove</a>
                </td>
            </tr>
          
            
        </tbody>
    </table>
</div>

</div>

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

  },
  methods: {
    read() {
  
          axios.post('http://localhost/MonSalonOnline-backend/api/all/'+localStorage.getItem('id'))
            .then(res => {
              console.log(res.data.appointments);
              this.data = res.data.appointments
              if (this.data.length === 0) {
                this.show = true
              }
            })
        
    },
    remove(d) {
      axios.post('http://localhost/MonSalonOnline-backend/api/delete/'+localStorage.getItem('id'), JSON.stringify({
          'heure': d.heure,
          'date': d.date

      }), {
  headers: {
    'Content-Type': 'application/json'
  }
})
        .then(()=>{
          window.location.reload();
        })
    }
  }
}
</script>
<style scoped>
</style>
