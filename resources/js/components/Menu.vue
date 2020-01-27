<template>
<div class="container pb-2">
  <nav class="navbar navbar-expand-lg navbar-light bg-custom">
    <a class="navbar-brand">
      <router-link :to="{name: 'home'}">
        <img width="200px" alt="HMC" src="images/logo3.png">
      </router-link>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li 
          v-if="$auth.check(1)" 
          v-for="(route, key) in routes.user" 
          v-bind:key="route.path"
          class="nav-item"
        >
          <router-link class="nav-link" :to="{ name : route.path }" :key="key">
              {{route.name}}
          </router-link>
        </li>
        <!--LOGGED ADMIN-->
        <li 
          v-if="$auth.check(2)" 
          v-for="(route, key) in routes.admin" 
          v-bind:key="route.path"
          class="nav-item"
        >
          <router-link class="nav-link" :to="{ name : route.path }" :key="key">
              {{route.name}}
          </router-link>
        </li>
        <!--LOGGED Client-->
        <li 
          v-if="$auth.check(3)" 
          v-for="(route, key) in routes.client" 
          v-bind:key="route.path"
          class="nav-item"
        >
          <router-link class="nav-link" :to="{ name : route.path }" :key="key">
              {{route.name}}
          </router-link>
        </li>
        <!--LOGOUT-->
        <li 
          v-if="$auth.check()"
          class="nav-item"
        >
          <a class="nav-link" href="#" @click.prevent="$auth.logout()">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
</div>
</template>
<script>
  export default {
    data() {
      return {
        routes: {
          // UNLOGGED
        //   unlogged: [
        //     {
        //       name: 'Inscription',
        //       path: 'register'
        //     },
        //     {
        //       name: 'Connexion',
        //       path: 'login'
        //     }
        //   ],
          // LOGGED USER
          user: [
            {
              name: 'Dashboard',
              path: 'dashboard'
            },
            {
              name: 'Cadastro de horas',
              path: 'cadastro-horas'
            }
          ],
          // LOGGED ADMIN
          admin: [
            {
              name: 'Dashboard',
              path: 'admin-dashboard'
            },
            {
              name: 'Nova Empresa',
              path: 'register-company'
            },
            {
              name: 'Novo Usuário',
              path: 'admin-register'
            },
            {
              name: 'Cadastro de horas',
              path: 'cadastro-horas'
            },
            {
              name: 'Cadastro de Serviços',
              path: 'cadastro-servicos'
            },
          ],
          // LOGGED Client
          client: [
            {
              name: 'Dashboard',
              path: 'client-dashboard'
            }
          ],
        }
      }
    },
    mounted() {
      //
    }
  }
</script>