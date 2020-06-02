<template>
  <div>
    <h1 class="h3 mb-4 text-gray-800">Create Note</h1>

    <div class="form-group">
      <label for="title">Title</label>
      <input v-model="note.title" type="text" id="title" class="form-control">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea v-model="note.description" type="text" id="description" class="form-control"></textarea>
    </div>

    <div class="form-group">
      <label for="status">Status</label>
      <select v-model="note.status_id" id="status" class="form-control">
        <option v-for="option in status" v-bind:value="option.id">
          {{ option.title }}
        </option>
      </select>

      <span>Selecionado: {{ note.status_id }}</span>
    </div>

    <hr>

    <button @click="save()" class="btn btn-primary">
      Save
    </button>

    <router-link to="/notes" class="btn btn-secondary">
      Back
    </router-link>


  </div>
</template>

<script>
  import axios from 'axios'

  export default {
    name: 'CreateNote',
    data() {
      return {
        note: {
          title: '',
          description: '',
          status_id: '',
        },
        status: []
      }
    },
    methods: {
      create() {
      },
      save() {

        let self = this;

        axios.post(  '/api/notes?token=' + localStorage.getItem("api_token"),
          self.note
        )
          .then(function (response) {

            self.note = {
              title: '',
              description: '',
              status_id: '',
            };

            //self.message = 'Successfully created note.';
            //self.showAlert();
            console.log(response)
          }).catch(function (error) {
          if(error.response.data.message == 'The given data was invalid.'){
            /*self.message = '';
            for (let key in error.response.data.errors) {
              if (error.response.data.errors.hasOwnProperty(key)) {
                self.message += error.response.data.errors[key][0] + '  ';
              }
            }*/
            // self.showAlert();
          } else {
            console.log(error);
            // self.$router.push({ path: 'login' });
          }
        });

      },
    },
    mounted: function(){
      let self = this;
      axios.get(  '/api/notes/create?token=' + localStorage.getItem("api_token"))
        .then(function (response) {
          console.log(response.data)
          self.status = response.data.status;
        }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    }

  }
</script>
