import { Http } from '@angular/http';
import { Injectable } from '@angular/core';
import { LoadingController, AlertController, ToastController } from 'ionic-angular';
/*
  Generated class for the ProcProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class ProcProvider {
	public loading;

  constructor(public http: Http,
  	public alerCtrl: AlertController,
    public loadingCtrl: LoadingController,
    public toastCtrl: ToastController) {
    console.log('Hello ProcProvider Provider');
  }

  showLoading(content): void {
    this.loading = this.loadingCtrl.create({
      content: content
    });    
    this.loading.present(); 
    this.loading   
  }

  showToast(message: string) {
    let toast = this.toastCtrl.create({
      message: message,
      duration: 2300,
      position: 'bottom'
    });
    toast.present(toast);    
  }

  showAlert(title:string,message:string) {
    let alert = this.alerCtrl.create({
      title: title,
      message: message.toString().replace('Error: ',''),
      buttons: ['OK']
    });
    alert.present();
  }

}
