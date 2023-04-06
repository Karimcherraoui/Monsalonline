<template>

  <headerComp></headerComp>
<div class="bg-cover min-h-screen flex flex-col justify-center" style="background-image: url(https://imgs.search.brave.com/y9TPQ45kcUt6IYi-VxTfgVcww6ESSf5lNRYb9fWj4xU/rs:fit:1080:720:1/g:ce/aHR0cHM6Ly9pbWFn/ZXMudW5zcGxhc2gu/Y29tL3Bob3RvLTE1/MDM5NTE5MTQ4NzUt/NDUyMTYyYjBmM2Yx/P2l4bGliPXJiLTEu/Mi4xJnE9ODAmZm09/anBnJmNyb3A9ZW50/cm9weSZjcz10aW55/c3JnYiZ3PTEwODAm/Zml0PW1heCZpeGlk/PWV5SmhjSEJmYVdR/aU9qRXlNRGQ5)">

  <div class="mainpage bg-white w-2/4 mx-auto max-w-screen-xl p-4 py-12 rounded-xl sm:px-6 lg:px-8 my-20">
    <div class="mx-auto max-w-lg   rounded-lg ">
      <h1 class="text-center text-2xl font-bold text-Black sm:text-3xl">
        To choose your date appointment
      </h1>

      <p class="mx-auto mt-4 w-2/3 text-center font-bold text-blue-500">
        Find your next appointment and book instantly
      </p>

      <div class="mt-6 mb-0 space-y-4 rounded-lg p-8 shadow-2xl">
        <p class="text-lg font-medium">Sign in to your account</p>

        <div>
          <label for="day" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Day</label>
          <div class="relative mt-1">
            <div>
              <input :min="today"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                v-model="month" type="date" >
            </div>
          </div>
        </div>

        <div v-if="show">
          <!-- {{ taken }} -->
          <label for="heure" class="text-sm font-medium">heure</label>
          <div class="relative mt-1" v-for="h in heure " :key="h">

            <div v-if="taken.heure.includes(h)">
  <div v-if="taken.client[taken.heure.indexOf(h)] === local"
    v-on:click="now(h)"
    class="taken transform hover:scale-105 transition duration-300 shadow-xl rounded-lg p-4 bg-blue-200 taken-by-current-client">
    {{ h }}
  </div>
  <div v-else
    v-on:click="now(h)"
    class="taken transform hover:scale-105 transition duration-300 shadow-xl rounded-lg p-4 bg-red-200 taken-by-other-client">
    {{ h }}
  </div>
</div>
<div v-else
  v-on:click="now(h)"
  class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg  p-4 bg-white">
  {{ h }}
</div>

</div>

        </div>
      </div>
    </div>
  </div>
</div>
</template>
<script>
import axios from 'axios'
export default {
  data() {
    return {
      today: '',
      day: '',
      local: localStorage.getItem('key'),
      show: false,
      heure: [],
      taken: {
        heure: [],
        client: []
      },
      checked : true,
      heureselected: '',
      dataappointment: [],
      id: '',
      month: '',
      week: '',
      allow: true,
    }
  },
  created(){
    const today = new Date().toISOString().split('T')[0];
        this.today   = today;
  },
  mounted() {
    this.heure = ['9h - 10h', '10h - 11h', '11h - 12h', '14h - 15h', '15h - 16h', '16h - 17h', '17h - 18h', '18h - 19h', '19h - 20h']

    if(localStorage.getItem('reference') == null){
      this.$router.push('/login')
    }
    this.affichage()
    // console.log(localStorage.getItem('reference'));

    axios.post('http://localhost/MonSalonOnline-backend/api/getClient'
    , JSON.stringify({
        'refernece': localStorage.getItem('reference'),
        
      }), {
  headers: {
    'Content-Type': 'application/json'
  }
})


// , [localStorage.getItem('key')])

.then(response => {
        // console.log(response);
        this.id = response.data.id
      })
  },
  methods: {



    affichage() {
      this.taken.heure = []
      this.taken.client = []
      console.log(localStorage.getItem("id"));
      axios.get('http://localhost/MonSalonOnline-backend/api/allRdv')
        .then(response => {
          //console.log(response.data.appointments);
          this.dataappointment = response.data.appointments.filter((appointement)=> appointement.date == this.month);
          for (let i = 0; i < this.dataappointment.length; i++) {
            console.log("=>", this.dataappointment[i].date, this.month)
            if(this.dataappointment[i].id_client == localStorage.getItem("id")){
              this.allow = false;
            }
            if (this.dataappointment[i].jour == this.day || this.dataappointment[i].date == this.day) {
              for (let j = 0; j < this.heure.length; j++) {
                if (this.dataappointment[i].heure == this.heure[j] && this.dataappointment[i].date == this.month) {
                  this.taken.heure.push(this.heure[j])
                  this.taken.client.push(this.dataappointment[i].reference)
                }
              }
            }
          }
          console.log(this.allow);
        })
    },

   


    now(heureselected) {
      console.log()
      if(this.allow == false)
        return;
      this.allow = false;
      if (this.taken.heure.includes(heureselected)) {
        return 
      } else {
        axios.post('http://localhost/MonSalonOnline-backend/api/addRdv'
        , JSON.stringify({
          'id_client': localStorage.getItem("id"),
        'heure': heureselected, 
        'jour': this.day, 
        'date': this.month, 
        'statut': 'en cours'

      }), {
  headers: {
    'Content-Type': 'application/json'
  }
})
          .then(response => {
            console.log(response)
            this.affichage()
            this.heureselected = ''
            alert('votre rendez-vous est bien pris Merci !!')
            
          })
      }
    },


    
  },

  watch: {
    day: function () {
      this.affichage()
      this.show = true;
      if (this.day == 'Monday' || this.day == 'Tuesday' || this.day == 'Wednesday' || this.day == 'Thursday' || this.day == 'Saturday') {
        this.heure = ['9h - 10h', '10h - 11h', '11h - 12h', '14h - 15h', '15h - 16h', '16h - 17h', '17h - 18h', '18h - 19h', '19h - 20h']
      } else if (this.day == 'Friday') {
        this.heure = ['9h - 10h', '10h - 11h', '11h - 12h', '16h - 17h', '17h - 18h', '18h - 19h', '19h - 20h', '20h - 21h', '21h - 22h']
      } else if (this.day == 'Sunday') {
        this.heure = ['9h - 10h', '10h - 11h', '11h - 12h']
      }
      this.affichage()
    },
    month: function () {
      this.allow = true;
      this.affichage()
      let input = new Date(this.month);
      let dayName = input.toLocaleString("default", { weekday: "long" });
      this.day = dayName
      this.affichage()
    }
  }
}
</script>
<style>

</style>