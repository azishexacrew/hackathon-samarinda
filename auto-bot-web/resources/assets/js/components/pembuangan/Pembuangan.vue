<template>
    <v-layout row wrap>
      <v-flex xs12 >
        <v-card flat color="transparet">
            <v-data-table
                :headers="headers"
                :items="items"
                class="elevation-1"
                >

                <template slot="items" slot-scope="props">
                  <td>{{ props.item.address }}</td>
                  <td class="text-xs-left">{{ props.item.kecamatan }}</td>
                  <td class="text-xs-left">{{ props.item.kelurahan }}</td>
                  <td class="text-xs-left">{{ props.item.lat }}</td>
                  <td class="text-xs-left">{{ props.item.lng }}</td>
                  <td class="text-xs-left">{{ props.item.action }}</td>
                </template>
            </v-data-table>
        </v-card>
      </v-flex>
    </v-layout>
    
</template>

<script>
window.Vue = require('vue');

  export default {
    data () {
      return {
        headers: [
          {
            text: 'Alamat TPS',
            align: 'left',
            sortable: false,
            value: 'address'
          },
          { text: 'Kecamatan', value: 'kecamatan' },
          { text: 'Kelurahan', value: 'kelurahan' },
          { text: 'lat', value: 'lat' },
          { text: 'lang', value: 'lng' },
          { text: 'Action',sortable: false, value: 'action' }
        ],
        items: [
          {
            value: false,
            
           
          }
        ],
      }
    },
    mounted(){
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