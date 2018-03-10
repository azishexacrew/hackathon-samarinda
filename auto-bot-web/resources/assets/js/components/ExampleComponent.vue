<template>
  <v-app>
    <v-alert type="success" :value="true">
     selamat vuetify kamu berhasil di import
    </v-alert>
  </v-app>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
