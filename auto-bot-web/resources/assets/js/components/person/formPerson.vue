<template>
  <div>
       <v-btn
      fab
      bottom
      right
      color="pink"
      dark
      fixed
      @click.stop="dialog = !dialog"
    >
      <v-icon>add</v-icon>
    </v-btn>
     <v-dialog
        v-model="dialog"
        fullscreen
        transition="dialog-bottom-transition"
        :overlay="false"
        scrollable
      >
        <v-card tile>
          <v-toolbar card dark color="teal">
            <v-btn icon @click.native="dialog = false" dark>
              <v-icon>close</v-icon>
            </v-btn>
            <v-toolbar-title>Input data person</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
              <v-btn dark flat @click.native="dialog = false">Save</v-btn>
            </v-toolbar-items>
          </v-toolbar>

          <!-- form  -->
          <v-card-text>
            <v-layout row wrap>
                <v-flex xs8 offset-xs2>
                    <v-card flat color="trasparent">
                        <v-card-text>
                            <v-form v-model="valid">

                                <v-text-field
                                label="Name"
                                v-model="name"
                                :rules="nameRules"
                                :counter="10"
                                required
                                ></v-text-field>
                                
                                <v-text-field
                                label="E-mail"
                                v-model="email"
                                :rules="emailRules"
                                required
                                ></v-text-field>

                                <v-select
                                :items="items"
                                v-model="e1"
                                label="Select"
                                single-line
                                ></v-select>

                            </v-form>

                        </v-card-text>
                    </v-card>
                </v-flex>
            </v-layout>
          </v-card-text>
          <div style="flex: 1 1 auto;"/>
        </v-card>
      </v-dialog>
  </div>
</template>
<script>
export default {
 data () {
      return {
        dialog: false,
        notifications: false,
        sound: true,
        widgets: false,

        // select form
         e1: null,
         items: [
          { text: 'State 1' },
          { text: 'State 2' },
          { text: 'State 3' },
          { text: 'State 4' },
          { text: 'State 5' },
          { text: 'State 6' },
          { text: 'State 7' }
        ],
        states: [
          'Alabama', 'Alaska', 'American Samoa', 'Arizona',
          'Arkansas', 'California', 'Colorado', 'Connecticut',
          'Delaware', 'District of Columbia', 'Federated States of Micronesia',
          'Florida', 'Georgia', 'Guam', 'Hawaii', 'Idaho',
          'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky',
          'Louisiana', 'Maine', 'Marshall Islands', 'Maryland',
          'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi',
          'Missouri', 'Montana', 'Nebraska', 'Nevada',
          'New Hampshire', 'New Jersey', 'New Mexico', 'New York',
          'North Carolina', 'North Dakota', 'Northern Mariana Islands', 'Ohio',
          'Oklahoma', 'Oregon', 'Palau', 'Pennsylvania', 'Puerto Rico',
          'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee',
          'Texas', 'Utah', 'Vermont', 'Virgin Island', 'Virginia',
          'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
        ]
      }
    }
}
</script>
