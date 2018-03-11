import { Component, ViewChild } from '@angular/core';
import { Nav, Platform } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { MenuController } from 'ionic-angular';

import { HomePage } from '../pages/home/home';
import { ListPage } from '../pages/list/list';
import { SignInPage } from '../pages/sign-in/sign-in';
import { CivilianPage } from '../pages/civilian/civilian';
import { Geolocation } from '@ionic-native/geolocation';

import * as firebase from 'firebase';
const config = {
  apiKey: "AIzaSyCf6hjo2sbY7aV3Hao31-flDI89cBipAFA",
  authDomain: "e-waste-3ebeb.firebaseapp.com",
  databaseURL: "https://e-waste-3ebeb.firebaseio.com",
  projectId: "e-waste-3ebeb",
  storageBucket: "e-waste-3ebeb.appspot.com",
  messagingSenderId: "850865762381" 
};
@Component({
  templateUrl: 'app.html'
})
export class MyApp {
  @ViewChild(Nav) nav: Nav;

  rootPage: any = SignInPage;  
  userProfile: any;

  pages: Array<{title: string, component: any}>;

  constructor(public platform: Platform,
    public statusBar: StatusBar,
    public splashScreen: SplashScreen,
    private menuCtrl:MenuController,
    private geolocation: Geolocation) {
    this.initializeApp();

    // used for an example of ngFor and navigation
    this.pages = [
      { title: 'Officer\'s', component: HomePage },
      { title: 'Civilian', component: CivilianPage }
    ];
    let watch = this.geolocation.watchPosition();
    watch.subscribe((data) => {
     //realtime
    });
  }

  initializeApp() {
    firebase.initializeApp(config);
    firebase.auth().onAuthStateChanged(user => {
    if (!user) {
          this.menuCtrl.enable(false, 'myMenu');
          this.rootPage= SignInPage;
          this.userProfile=null;
        } else{
          this.userProfile=user;
          this.menuCtrl.enable(true, 'myMenu');          
          this.rootPage= HomePage;
        }
      });    
    this.platform.ready().then(() => {
      // Okay, so the platform is ready and our plugins are available.
      // Here you can do any higher level native things you might need.
      this.statusBar.styleDefault();
      this.splashScreen.hide();
    });
  }

  openPage(page) {
    // Reset the content nav to have just this page
    // we wouldn't want the back button to show in this scenario
    this.nav.setRoot(page.component);
  }

  signout(){
    firebase.auth().signOut();
  }
}
