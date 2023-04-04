<template>

  <div class="bg-cover min-h-screen flex flex-col" style="background-image: url(https://imgs.search.brave.com/y9TPQ45kcUt6IYi-VxTfgVcww6ESSf5lNRYb9fWj4xU/rs:fit:1080:720:1/g:ce/aHR0cHM6Ly9pbWFn/ZXMudW5zcGxhc2gu/Y29tL3Bob3RvLTE1/MDM5NTE5MTQ4NzUt/NDUyMTYyYjBmM2Yx/P2l4bGliPXJiLTEu/Mi4xJnE9ODAmZm09/anBnJmNyb3A9ZW50/cm9weSZjcz10aW55/c3JnYiZ3PTEwODAm/Zml0PW1heCZpeGlk/PWV5SmhjSEJmYVdR/aU9qRXlNRGQ5)">
              <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
                  <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                      <h1 class="mb-8 text-3xl text-center">Sign up</h1>
                      <form  class="space-y-4 md:space-y-6" @submit.prevent="signup">

                      <input 
                          type="text"
                          class="block border border-grey-light w-full p-3 rounded mb-4"
                          v-model="prenom"
                          placeholder="Prenom" />
  
                      <input 
                          type="text"
                          class="block border border-grey-light w-full p-3 rounded mb-4"
                          v-model="nom"
                          placeholder="Nom" />
                          <input 
                          type="email"
                          class="block border border-grey-light w-full p-3 rounded mb-4"
                          v-model="email"
                          placeholder="Email" />
  
                      <input 
                          type="tel"
                          class="block border border-grey-light w-full p-3 rounded mb-4"
                          v-model="phone"
                          placeholder="Numero de Telephone" />
  <div class="my-4 border"></div>
                          <!-- <input 
                          type="text"
                          class="block border border-grey-light w-full p-3 rounded mb-4"
                          v-model="reference"
                          placeholder="Référence auto-générée" />
                      -->
  
                          <button 
                          type="submit"
                          class="w-full text-center py-3 rounded bg-green-700 text-white hover:bg-green-dark focus:outline-none my-1"
                          >Create Account</button>
                          
                        </form>
                      <div class="text-center text-sm text-grey-dark mt-4">
                          By signing up, you agree to the 
                          <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                              Terms of Service
                          </a> and 
                          <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                              Privacy Policy
                          </a>
                      </div>
                  </div>
  
                  <div class=" text-blue-700 mt-6">
                    <span class="text-white">
  
                      Already have an account? 
                    </span>
                      <a class="no-underline border-b border-blue text-blue" href="../login/">
                          Log in
                      </a>.
                  </div>
              </div>
          </div>
  </template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      prenom: '',
      nom: '',
      phone: '',
      email: '',
      error: false
    }
  },

  mounted() {
    if (localStorage.getItem('reference') !== null) {
      this.$router.push('/calendrier')
    }
  },

  methods: {
    signup() {
      if (this.nom === '' || this.prenom === '' || this.phone === '' || this.email === '') {
        this.error = true
      } else {
        this.error = false
        axios.post('http://localhost/MonSalonOnline-backend/api/createClient', JSON.stringify({
          'prenom': this.prenom,
          'nom': this.nom,
          'phone': this.phone,
          'email': this.email 
      }), {
  headers: {
    'Content-Type': 'application/json'
  }
})
        .then(response => {


          if (response.data.message === 'client created') {
            this.$router.push('/login')
            this.token = response.data.reference;
            this.$swal(`Register Done this is your Token : ${this.token}`);
          }
        })
        .catch(error => {
          console.log(error)
        })
      }
    }
  },

  computed: {
    signupForm() {
      return !(this.nom === '' || this.prenom === '' || this.phone === '' || this.email === '')
    }
  }
}
</script>

<style>
</style>