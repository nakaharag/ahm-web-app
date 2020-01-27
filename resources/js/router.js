import VueRouter from 'vue-router'
// Pages
import Home from './pages/Home'
import Register from './pages/admin/Register'
import RegisterCompany from './pages/user/RegisterCompany'
import Company from './pages/user/Company'
import Login from './pages/Login'
import Survey from './pages/user/Survey'
import SurveyResult from './pages/user/SurveyResult'
import Dashboard from './pages/user/Dashboard'
import userPage from './pages/user/Page'
import AdminDashboard from './pages/admin/Dashboard'
import CadastroHoras from './pages/user/CadastroHoras'
import ClientDashboard from './pages/client/Dashboard'
import CadastroServicos from './pages/user/CadastroServicos'

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
      auth: {roles: [1, 2], redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/survey',
    name: 'survey',
    component: Survey,
    meta: {
      auth: true
    }
  },
  {
    path: '/survey/result',
    name: 'survey-result',
    component: SurveyResult,
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
  {
    path: '/cadastro-horas',
    name: 'cadastro-horas',
    component: CadastroHoras,
    meta: {
      auth: {roles: [1, 2], redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/cadastro-servicos',
    name: 'cadastro-servicos',
    component: CadastroServicos,
    meta: {
      auth: {roles: [1, 2], redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  // ADMIN ROUTES
  {
    path: '/admin',
    name: 'admin-dashboard',
    component: AdminDashboard,
    meta: {
      auth: {roles: [1, 2], redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },  
  {
  path: '/register',
  name: 'admin-register',
  component: Register,
  meta: {
    auth: {roles: [1, 2], redirect: {name: 'login'}, forbiddenRedirect: '/403'}
  }
  },
  {
    path: '/user',
    name: 'user',
    component: userPage,
    meta: {
        auth: true
    }
  },
  // Client ROUTES
  {
    path: '/client-dashboard',
    name: 'client-dashboard',
    component: ClientDashboard,
    meta: {
      auth: {roles: 3, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
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