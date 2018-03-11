<template>
  <div>

   <v-dialog v-model="dialog3" max-width="500px">
      <v-card>
        <v-card-title>
          <!-- formRegistras.vue -->
          <form-registrasi></form-registrasi>
          <v-spacer></v-spacer>
        </v-card-title>
        <v-card-actions>
          <v-btn color="primary" flat @click.stop="dialog3=false">Close</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

  <v-form v-model="valid" ref="form" lazy-validation>
    <v-text-field
      label="Email"
      v-model="email"
      :rules="emailRules"
      :counter="10"
      required
    ></v-text-field>
    <v-text-field
      label="Password"
      v-model="password"
      :rules="passwordRules"
      required
    ></v-text-field>

    <v-checkbox
      label="Do you agree?"
      v-model="checkbox"
      :rules="[v => !!v || 'You must agree to continue!']"
      required
    ></v-checkbox>
   <!-- submit -->
    <v-btn
      @click="submit"
      
      color="green"
      dark
    >
      submit
    </v-btn>
    <!-- registrasi -->
     <v-btn @click.stop="dialog3 = true">
        Register
    </v-btn>
  </v-form>
</div>
</template>

<script>
  import axios from 'axios'

  let formRegistrasi = require('./formRegister');
  export default {
    data: () => ({
      dialog3: false,
      valid: true,
      name: '',
      emailRules: [
        v => !!v || 'Name is required',
        v => (v && v.length <= 10) || 'Name must be less than 10 characters'
      ],
      email: '',
      passwordRules: [
        v => !!v || 'E-mail is required',
        v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
      ],
    
      checkbox: false
    }),

    methods: {
      submit () {
        if (this.$refs.form.validate()) {
          // Native form submission is not yet supported
          axios.post('/api/submit', {
            name: this.name,
            email: this.email,
            select: this.select,
            checkbox: this.checkbox
          })
        }
      }
    },
    components:{
      formRegistrasi
    }
  }
</script>