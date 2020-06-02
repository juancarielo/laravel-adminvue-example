<template>
  <div>
    <h1 class="h3 mb-3 text-gray-800">Notes</h1>

    <router-link  type="button" class="mb-3 btn btn-primary" to="/notes/create">
      Create
    </router-link>

    <table class="mb-3 table table-hover table-bordered">
      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Status</th>
        <th scope="col">Modified</th>
        <th scope="col">Actions</th>
      </tr>
      </thead>
      <tbody>
        <tr v-for="note in notes">
          <td>{{ note.id }}</td>
          <td>{{ note.title }}</td>
          <td>{{ note.description }}</td>
          <td>{{ note.status_id }}</td>
          <td>{{ note.created_at }}</td>
          <td>
            <a href="#">Edit</a>
          </td>
        </tr>
      </tbody>
      <tbody>

      </tbody>
    </table>

    <div v-for="champion in champions" :key="champion.id">
      <p>{{ champion.name }}</p>
      <p>{{ champion.title }}</p>

      <input v-model="champion.name">
      <input v-model="champion.title">
    </div>
  </div>
</template>

<script>
  import axios from 'axios'
  export default {
    name: 'Notes',
    data() {
      return {
        notes: []
      }
    },
    mounted() {
      let self = this;

      axios.get('/api/notes?token=' + localStorage.getItem("api_token")).then(response => {
        console.log(response)
        this.notes = response.data;
      });
    }
  }
</script>
