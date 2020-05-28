<template>
  <div class="d-flex align-items-center min-vh-100">
    <div class="container">
      <div class="row justify-content-md-center text-center">
        <div class="col-md-6">
          <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body">
              <div class="p-5">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                <p v-if="message">{{ message }}</p>
                <form @submit.prevent="register" method="POST" class="user">
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user" placeholder="First Name"
                             v-model="first_name" name="first_name" id="first_name">
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control form-control-user" placeholder="Last Name"
                             v-model="last_name" name="last_name">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" placeholder="Email" v-model="email">
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="password" class="form-control form-control-user" placeholder="Password"
                             v-model="password">
                    </div>
                    <div class="col-sm-6">
                      <input type="password" class="form-control form-control-user" placeholder="Confirm Password"
                             v-model="password_confirmation">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Register Account
                  </button>
                  <hr>
                </form>
                <a class="small" href="/register">Forgot Password?</a>
                <br>
                <router-link :to="{ path: 'login'}" exact class="small">
                  Already have an account? Login!
                </router-link>
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
    name: 'Register',
    data() {
      return {
        first_name: '',
        last_name: '',
        email: '',
        password: '',
        password_confirmation: '',
        message: '',
        error: false
      }
    },
    methods: {
      register() {
        let self = this;
        axios.post('/api/register', {
          first_name: self.first_name,
          last_name: self.last_name,
          email: self.email,
          password: self.password,
          password_confirmation: self.password_confirmation
        }).then(function (response) {
          self.first_name = '';
          self.last_name = '';
          self.email = '';
          self.password = '';
          self.password_confirmation = '';

          self.$router.push({path: '/login'});
        }).catch(function (error) {

          self.error = true;

          self.message = error;
        });

      }
    }
  }
</script>
