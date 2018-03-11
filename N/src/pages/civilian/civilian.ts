import { Component, ViewChild, ElementRef } from '@angular/core';
import { IonicPage } from 'ionic-angular';
import { NavController, ToastController } from 'ionic-angular';
import { Http, Headers, RequestOptions } from '@angular/http';

import 'rxjs/add/operator/retry';
import 'rxjs/add/operator/timeout';
import 'rxjs/add/operator/delay';
import 'rxjs/add/operator/map';
import { ProcProvider } from '../../providers/proc/proc';
declare var google;
import { Geolocation } from '@ionic-native/geolocation';

@Component({
  selector: 'page-civilian',
  templateUrl: 'civilian.html',
})
export class CivilianPage {
@ViewChild('map1') mapElement: ElementRef;
  map: any;  
  public data:any;
  public lat=[];
  public lng=[];
  public waypoints=[];
  public summary:any=[];
  public directionsService = new google.maps.DirectionsService;
  public directionsDisplay = new google.maps.DirectionsRenderer({
        map: this.map,
        suppressMarkers: false,
        hideRouteList:true
    });
  private param;
  constructor(public navCtrl: NavController,
  	public http:Http,
  	public proc:ProcProvider,
  	public toastCtrl: ToastController,
  	private geolocation: Geolocation) {
  }

  sortNumber(a,b) {
    return a - b;
  }

  ionViewDidLoad(){
    this.initMap();
  }

  initMap() {  	
  	this.proc.showLoading('');
  	let lat,lng;
  	this.geolocation.getCurrentPosition().then((resp) => {
 	lat= resp.coords.latitude;
 	lng= resp.coords.longitude;
	}).catch((error) => {
	  console.log('Error getting location', error);
	});
    this.map = new google.maps.Map(this.mapElement.nativeElement, {
      zoom: 14,
      center: {lat: lat, lng: lng},
 	  disableDefaultUI: true,
    });
    this.directionsDisplay.setMap(this.map);    
    this.addTPS();
    // this.directionsDisplay.setPanel(document.getElementById('right-panel'));
    }

  addTPS():void{  	
  	let headers = new Headers();
	headers.append('Content-Type', 'application/json');
    headers.append('Authorization', 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjE4M2U4OTgyYzI1ZjQ3Mzc3ZTkyMzZlMzdkNjNmNDZlMDE4YWU0Y2UyMTJiNDk0ZDgyYTg1MWJjYTc0M2NjN2FiMjk4MTIzNzMwNWFlNDBiIn0.eyJhdWQiOiIzIiwianRpIjoiMTgzZTg5ODJjMjVmNDczNzdlOTIzNmUzN2Q2M2Y0NmUwMThhZTRjZTIxMmI0OTRkODJhODUxYmNhNzQzY2M3YWIyOTgxMjM3MzA1YWU0MGIiLCJpYXQiOjE1MjA2NTUzMjcsIm5iZiI6MTUyMDY1NTMyNywiZXhwIjoxNTUyMTkxMzI3LCJzdWIiOiIxMTYiLCJzY29wZXMiOlsiUHJvdmluc2kiLCJLYWJ1cGF0ZW5cL0tvdGEiLCJLZWNhbWF0YW4iLCJLZWx1cmFoYW4iLCJTZWtvbGFoIiwiTW9ub2dyYWZpIiwiRExIIiwiVGVuYW50Il19.Wpc7O7wYO4kRhX22OOG8yMykotuD54Y3RTuiCJBfUZ-BCBMcPw-7z0odbgMZLRXDWU1Hmp0ATs9MkKkVvTYAGwWDJZjXqJckD-grvx5DgJmO1KUsbyips4OR4DqLodC2POHUI5ajdIoucIErYiRTuTUIN8ojQND_If0JcxIo1DHUsHzgqjgm9fwKB8hYbgyZTCYfgeH7bdb67QT-lQPP1LHeF6W6ggjApwDom_CQ9gAj-uDiEtoohk8J8x9jNdPFbDjRIC9EwLlc44lR8ZEvCwUAm01-KHW3L5iB1_kixcF-djZU7Ad0S8bGPe8-Pl0P6wy2OPw7a50OJU6fI5QdHQyPjmu3lFA0SfE_x8db1VSJhKuPKUTEetWtnlAMBC7AmxZ2gc4C_r2wghtZ8T8hWdhSyglUwqLHYcOj-8fGMrEkN2q1c27eE4AFj9_uD-YIF5U1D0knk_pLxx4LshBxAkf0snnKYzTTnBd_7elRHmOnsqPbllyVpo3nXjNZFuJP8toPrgd3Dl3T44KMQpLq03sUVjDZcreJWGfEw3FqfJ5F6bK-28SO0FSt_5oCwuhgAtCvutiSZTaOQ3RAGvjsLC9WUncChmepFKlsNKToO9h1bxjrt5sMBX0o1Y0NHEA9vbFbSK4mx5llE0kIILeg43OOicFUWyUV1tK4u4jMkY0');
	let options = new RequestOptions({ headers: headers });
    let urlApi = 'http://api.samarindakota.go.id/api/v1/bank/lingkungan-hidup/tps';
    let start_at=47;
	this.http.get(urlApi ,options)
	 .subscribe((res)=>{
	 this.data = res.json();
	 this.data.data.sort(this.sortNumber);
	 	for (var i = start_at; i < this.data.data.length; i++) {
	 		this.addMarkers(this.data.data[i].nama,this.data.data[i].latitude,this.data.data[i].longitude);	 		
	 		this.lat[i] = parseFloat(this.data.data[i].latitude);
	 		this.lng[i] = parseFloat(this.data.data[i].longitude);
	 		if (i>=start_at || i<52) {
	 		this.waypoints.push({
             location: {lat:parseFloat(this.lat[i]),lng:parseFloat(this.lng[i])},
             stopover: true
            });	 			
	 		}
	 	}	 	
	 	console.log('start lat:'+parseFloat(this.lat[start_at])+'end lat:'+parseFloat(this.lat[58]));
	 	let A = {lat:parseFloat(this.lat[start_at]),lng:parseFloat(this.lng[start_at])};
	 	let B = {lat:parseFloat(this.lat[58]),lng:parseFloat(this.lng[58])};
	 	this.calculateAndDisplayRoute(A, B, this.directionsService, this.directionsDisplay);
	 	this.proc.loading.dismiss();
	}, (err) => {
		this.proc.loading.dismiss();
		this.proc.loading.showToast(err);
    });	 
  }

  addMarkers(title, latitude, longitude):void{
  	var marker = new google.maps.Marker({
        position: {lat:parseFloat(latitude),lng:parseFloat(longitude)},
        map: this.map,
    	title: title,
    	visible: true,
    	label: title
	});
  }
  
  calculateAndDisplayRoute(origin, destenation, directionsService, directionsDisplay):void {  	
    directionsService.route({
      origin: origin,
      destination: destenation,
      travelMode: google.maps.TravelMode.DRIVING,
      waypoints: this.waypoints,
      avoidTolls: true
    }, (response, status) => {
      if (status === 'OK') {
        this.directionsDisplay.setDirections(response);        
      }
	});
  }
}