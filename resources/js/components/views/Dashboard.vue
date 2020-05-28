<template>
  <div>
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
  </div>
</template>

<script>
  import axios from 'axios'

  export default {
    name: 'Dashboard',
    methods: {
      getNotes() {
        let self = this;

        axios.defaults.headers.common = {'Authorization': 'Bearer ' + localStorage.getItem("api_token")}

        const config = {
          headers: { Authorization: 'Bearer ' + localStorage.getItem("api_token")}
        };

        axios.get('/api/dashboard', config)
          .then(function (response) {
            console.log(response)
          }).catch(function (error) {
          console.log("errou");
          self.$router.push({path: '/login'});
        });

      }
    },

    beforeMount: function () {
      this.getNotes()
    }

  }
</script>
