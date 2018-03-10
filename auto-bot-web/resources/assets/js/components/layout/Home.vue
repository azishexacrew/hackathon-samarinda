<template>
    <v-layout row wrap>
      <v-flex xs12 >
        <v-card flat color="transparet">
          <v-card-text class="px-0">Ini halaman dashboard</v-card-text>
        </v-card>
      </v-flex>
    </v-layout>
</template>

<script>
  export default {
    props: {
      source: String
    }
  }
</script>