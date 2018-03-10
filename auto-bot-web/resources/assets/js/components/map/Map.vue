<template>
  <v-layout row wrap>
      <v-flex xs12 >
        <gmap-map
          :center="center"
          :zoom="18"
          style="width:100%; height: 85vh;"
        >
          <gmap-marker
            :key="index"
            v-for="(m, index) in markers"
            :position="m.position"
            :clickable="true"
            :draggable="true"
            @click="center=m.position"
          ></gmap-marker>
        </gmap-map>
      </v-flex>
    </v-layout>
</template>
<script>
import Vue from 'vue'
import * as VueGoogleMaps from 'vue2-google-maps'
Vue.use(VueGoogleMaps, {
  load: {
    key: ' AIzaSyDGTJj1KSaycU5A1ZSWRwVUBm8ldQ4kz0c',
    libraries: 'places',
  }
})
export default {
    data () {
      return {
        center: {lat: -0.4755328, lng: 117.1495604},
        markers: [{
          position: {lat: -0.4755328, lng: 117.1495604}
        }, {
          position: {lat: 11.0, lng: 11.0}
        }]
      }
    }
  }
</script>
