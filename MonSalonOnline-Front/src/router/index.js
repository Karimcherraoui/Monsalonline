import { createRouter, createWebHistory } from 'vue-router'
import Signup from '../views/Signup.vue'
import Login from '../views/Login.vue'
import Calendrier from '../views/Calendrier.vue'



const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    

    {
      path: '/',
      name: 'homepage',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/homepage.vue')
    },
    {
      path: '/Signup',
      name: 'Signup',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/Signup.vue')
    },
    {
      path: '/Login',
      name: 'Login',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/Login.vue')
    },
    {
      path: '/Calendrier',
      name: 'calendrier',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/Calendrier.vue')
    }
  ]
})

export default router
