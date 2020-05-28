<template>
  <div class="d-flex align-items-center min-vh-100">
    <div class="container">
      <div class="row justify-content-md-center text-center">
        <div class="col-md-6">
          <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                </div>

                <form @submit.prevent="login" class="user">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="email"
                           aria-describedby="emailHelp" placeholder="Email" v-model="email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password"
                           placeholder="Password" v-model="password">
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox" class="custom-control-input" id="customCheck">
                      <label class="custom-control-label" for="customCheck">Remember Me</label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                </form>


                <hr>
                <div class="text-center">
                  <a class="small" href="/login">Forgot Password?</a>
                </div>
                <div class="text-center">
                  <router-link :to="{ path: 'register'}" class="small">
                    Create an Account!
                  </router-link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from "axios";

  export default {
    name: 'Login',
    data() {
      return {
        email: '',
        password: '',
      }
    },
    methods: {
      login() {
        let self = this;

        axios.post('api/login', {
          email: self.email,
          password: self.password
        }).then(function (response) {
          self.email = '';
          self.password = '';
          console.log(response)
          localStorage.setItem("api_token", response.data.access_token);
          self.$router.push({path: 'dashboard'});
        }).catch(function (error) {
          self.message = error;
          console.log(error)
        });
      }
    }
  }
</script>
