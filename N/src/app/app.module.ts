import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';
import { HttpModule } from '@angular/http';
import { HttpClientModule } from '@angular/common/http';

import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { ListPage } from '../pages/list/list';
import { SignInPage } from '../pages/sign-in/sign-in';
import { CivilianPage } from '../pages/civilian/civilian';

import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { ProcProvider } from '../providers/proc/proc';

import { AngularFireModule } from 'angularfire2';
import { AngularFireDatabaseModule } from 'angularfire2/database';

import { Geolocation } from '@ionic-native/geolocation';

const config = {
  apiKey: "AIzaSyCf6hjo2sbY7aV3Hao31-flDI89cBipAFA",
  authDomain: "e-waste-3ebeb.firebaseapp.com",
  databaseURL: "https://e-waste-3ebeb.firebaseio.com",
  projectId: "e-waste-3ebeb",
  storageBucket: "e-waste-3ebeb.appspot.com",
  messagingSenderId: "850865762381" 
};
@NgModule({
  declarations: [
    MyApp,
    HomePage,
    ListPage,
    SignInPage,
    CivilianPage
  ],
  imports: [
    BrowserModule,
    IonicModule.forRoot(MyApp),
    HttpModule,
    HttpClientModule,
    AngularFireModule.initializeApp(config),
    AngularFireDatabaseModule
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    ListPage,
    SignInPage,
    CivilianPage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler},
    ProcProvider,
    Geolocation
  ]
})
export class AppModule {}
