import VueRouter from 'vue-router'
// Pages
import Home from './pages/Home'
import Register from './pages/admin/Register'
import RegisterCompany from './pages/user/RegisterCompany'
import Company from './pages/user/Company'
import Login from './pages/Login'
import Dashboard from './pages/user/Dashboard'
import userPage from './pages/user/Page'
import AdminDashboard from './pages/admin/Dashboard'

// Routes
const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    meta: {
      auth: undefined
    }
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: {
      auth: false
    }
  },
  // USER ROUTES
  {
    path: '/dashboard',
    name: 'dashboard',
    component: Dashboard,
    meta: {
      auth: true
    }
  },
  {
    path: '/register-company',
    name: 'register-company',
    component: RegisterCompany,
    meta: {
      auth: true
    }
  },
  {
    path: '/company',
    name: 'company',
    component: Company,
    meta: {
      auth: true
    }
  },
  // ADMIN ROUTES
  {
    path: '/admin',
    name: 'admin.dashboard',
    component: AdminDashboard,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },  
    {
    path: '/register',
    name: 'admin.register',
    component: Register,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/user/:id',
    name: 'user',
    component: userPage,
    meta: {
        auth: true
    }
  },
  { path: '*', redirect: '/' },
]
const router = new VueRouter({
  history: true,
  mode: 'history',
  routes,
})
export default router