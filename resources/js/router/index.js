import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

// Containers
const TheContainer = () => import('../components/containers/TheContainer')

// Views
import Dashboard from '../components/views/Dashboard'

// Views
import Notes from '../components/views/notes/Notes'
import CreateNote from '../components/views/notes/CreateNote'

// Views - Pages
const Login = () => import('../components/views/pages/Login')
const Register = () => import('../components/views/pages/Register')
const Page404 = () => import('../components/views/pages/Page404')

export default new Router({
  mode: 'history', // https://router.vuejs.org/api/#mode
  linkActiveClass: 'active',
  scrollBehavior: () => ({y: 0}),
  routes: configRoutes()
})

function configRoutes() {
  return [
    {
      path: '/',
      redirect: '/dashboard',
      name: 'Home',
      component: TheContainer,
      children: [
        {
          path: 'dashboard',
          name: 'Dashboard',
          component: Dashboard
        },
        {
          path: 'notes',
          meta: {label: 'Notes'},
          component: {
            render(c) {
              return c('router-view')
            }
          },
          children: [
            {
              path: '',
              component: Notes,
            },
            {
              path: 'create',
              meta: {label: 'Create Note'},
              name: 'Create Note',
              component: CreateNote
            },
          ]
        },
      ]
    },
    {
      path: '/',
      redirect: '/login',
      name: 'Auth',
      component: {
        render(c) {
          return c('router-view')
        }
      },
      children: [
        {
          path: 'login',
          name: 'Login',
          component: Login
        },
        {
          path: 'register',
          name: 'Register',
          component: Register
        },
      ]
    },
    {
      path: '*',
      component: Page404
    }
  ];
}

