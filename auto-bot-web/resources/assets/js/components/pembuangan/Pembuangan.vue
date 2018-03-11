<template>
    <v-layout row wrap>
      <v-flex xs12 >
        <v-card flat color="transparet">
          <ul>
              <li v-for="post in posts">{{ post }}</li>
          </ul>
        </v-card>
      </v-flex>
    </v-layout>
    
</template>

<script>
window.Vue = require('vue');

import axios from 'axios'
  export default {
    data () {
      return {
        posts: [],
        errors: [],
      }
    },
    created(){
      axios.get('api/data/tps')
        .then(function (response) {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
    }
  }
  
</script>