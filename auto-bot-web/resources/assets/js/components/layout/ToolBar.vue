<template>
<div>
    <!-- side navbar -->
<v-navigation-drawer fixed  hide-overlay :mini-variant.sync="mini" v-model="drawer" app>
    <v-toolbar flat class="transparent" style="margin-top:80px;">
        <v-list class="pa-0">
        <v-list-tile avatar>
            <v-list-tile-avatar>
            <img src="https://randomuser.me/api/portraits/men/85.jpg" >
            </v-list-tile-avatar>
            <v-list-tile-content>
            <v-list-tile-title>User Name</v-list-tile-title>
            </v-list-tile-content>
        </v-list-tile>
        </v-list>
    </v-toolbar>
    <v-list class="pt-0" dense>
        <v-divider></v-divider>
    <!-- beranda -->
        <v-list-tile  @click="edit()" href="#/">
            <v-list-tile-action>
                <v-icon>dashboard</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
                <v-list-tile-title >Beranda</v-list-tile-title>
            </v-list-tile-content>
        </v-list-tile>
    <!-- route -->
        <v-list-tile  @click="edit()" href="#/map">
            <v-list-tile-action>
                <v-icon>map</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
                <v-list-tile-title >Route</v-list-tile-title>
            </v-list-tile-content>
        </v-list-tile>
    <!-- person -->
        <v-list-tile  @click="edit()" href="#/person">
            <v-list-tile-action>
                <v-icon>people_outline</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
                <v-list-tile-title >Person</v-list-tile-title>
            </v-list-tile-content>
        </v-list-tile>
    <!-- laporan -->
        <v-list-tile  @click="edit()" href="#/laporan">
            <v-list-tile-action>
                <v-icon>assignment</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
                <v-list-tile-title >Laporan</v-list-tile-title>
            </v-list-tile-content>
        </v-list-tile>  
    </v-list>
</v-navigation-drawer>

<!--Top Navbar  -->
<v-toolbar
    color="teal darken-2"
    dark
    app
    :clipped-left="$vuetify.breakpoint.lgAndUp"
    fixed
    flat
>
    <v-toolbar-title style="width: 300px" class="ml-0 pl-3">
    <v-toolbar-side-icon @click.native.stop="mini = !mini"></v-toolbar-side-icon>
    <span class="hidden-sm-and-down">Auto-Bot</span>
    </v-toolbar-title>
    <v-text-field
    flat
    solo-inverted
    prepend-icon="search"
    label="Search"
    class="hidden-sm-and-down"
    ></v-text-field>
    <v-spacer></v-spacer>
    <!-- url logout -->
    <v-btn icon href="#/"> 
    <v-icon >power_settings_new</v-icon>
    </v-btn>
</v-toolbar>
</div>
</template>
<script>
  export default {
    data () {
      return {
        drawer: true,
        mini: false,
        right: null
      }
    }
  }
</script>