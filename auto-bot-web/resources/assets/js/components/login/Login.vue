<template>
  <v-app>
       <v-flex xs2 style="position:absolute;z-index:1;margin-top:0px;">
                    <v-btn @click.stop="drawer = !drawer" flat  >
                        <v-icon>menu</v-icon>
                    </v-btn>
                </v-flex>
       <v-layout style="margin-top:-100px;">
           <v-container>
                <v-flex xs12 sm4 offset-sm4> 
                    <v-card flat>
                        <!-- title -->
                        <v-card-title primary-title>
                        
                        </v-card-title>
                        <!-- from-content -->
                        <v-card-text>
                            <login-form></login-form>
                        </v-card-text>
                    </v-card>
                </v-flex>
                <v-navigation-drawer
                temporary
                v-model="drawer"
                absolute
                >
                <v-list class="pa-1">
                    <v-list-tile avatar>
                    <v-list-tile-avatar>
                        <img src="https://randomuser.me/api/portraits/men/85.jpg" >
                    </v-list-tile-avatar>
                    <v-list-tile-content>
                        <v-list-tile-title>John Leider</v-list-tile-title>
                    </v-list-tile-content>
                    </v-list-tile>
                </v-list>
                <v-list class="pt-0" dense>
                    <v-divider></v-divider>
                    <v-list-tile v-for="item in items" :key="item.title" >
                    <v-list-tile-action>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                    </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-navigation-drawer>
        </v-container>
    </v-layout>
  </v-app>
</template>
<script>

let LoginForm = require('./LoginForm')

  export default {
    data () {
      return {
        drawer: null,
        items:[
            { title: 'Home', icon: 'dashboard' },
            { title: 'About', icon: 'question_answer' }
        ],
        card_text: 'Lorem ipsum dolor sit amet, brute iriure accusata ne mea. Eos suavitate referrentur ad, te duo agam libris qualisque, utroque quaestio accommodare no qui. Et percipit laboramus usu, no invidunt verterem nominati mel. Dolorem ancillae an mei, ut putant invenire splendide mel, ea nec propriae adipisci. Ignota salutandi accusamus in sed, et per malis fuisset, qui id ludus appareat.'
      }
    },
    components:{LoginForm}
  }
</script>
