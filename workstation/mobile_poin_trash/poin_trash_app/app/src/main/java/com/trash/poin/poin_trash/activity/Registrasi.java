package com.trash.poin.poin_trash.activity;

import android.content.Context;
import android.content.Intent;
import android.media.Ringtone;
import android.media.RingtoneManager;
import android.net.Uri;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.ontbee.legacyforks.cn.pedant.SweetAlert.SweetAlertDialog;
import com.trash.poin.poin_trash.R;
import com.trash.poin.poin_trash.config.Const;
import com.trash.poin.poin_trash.model.ResponseUser;
import com.trash.poin.poin_trash.service.ApiEndpointService;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;

import butterknife.BindView;
import butterknife.ButterKnife;
import butterknife.OnClick;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class Registrasi extends AppCompatActivity {

    private Button login,register;
    Retrofit retrofit;
    Context context;

    @BindView(R.id.nama)EditText eNama;
    @BindView(R.id.kontak)EditText eKontak;
    @BindView(R.id.email)EditText eEmail;
    @BindView(R.id.alamat_rumah)EditText eAlamat;
    @BindView(R.id.password)EditText ePassword;
    @BindView(R.id.password_confirmation)EditText ePasswordConfirmation;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.registrasi_activity);
        ButterKnife.bind(this);
        context=this;
        initialLayout();
        initializeRetrofit();
    }

    private void initialLayout() {
        login = (Button) findViewById(R.id.login_btn);
        login.setOnClickListener(v -> {
           Intent login = new Intent(Registrasi.this,Login.class);
           startActivity(login);
        });

        register = (Button) findViewById(R.id.email_sign_up_button);
        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                registerNewUser(eKontak.getText().toString(),eNama.getText().toString(),eEmail.getText().toString(),
                        eAlamat.getText().toString(),ePassword.getText().toString(),ePasswordConfirmation.getText().toString());
            }
        });
    }

    private void initializeRetrofit(){
        retrofit = new Retrofit.Builder()
                .baseUrl(Const.BASE_API_URL)
                .addConverterFactory(GsonConverterFactory.create())
                .build();
    }


    public void registerNewUser(String kontak, String nama,String email,String alamat,String password,String password_confirmation){
        try {
            ApiEndpointService apiService = retrofit.create(ApiEndpointService.class);
            Call<ResponseUser> result = apiService.registerUser(
                    kontak,
                    nama,
                    email,
                    alamat,
                    password,
                    password_confirmation);
            result.enqueue(new Callback<ResponseUser>() {
                @Override
                public void onResponse(Call<ResponseUser> call, Response<ResponseUser> response) {
                    /*showProgress(false);*/
                    if(response.isSuccessful() ){
                        if(response.body().getSuccess()){

                            Uri notification = RingtoneManager.getDefaultUri(RingtoneManager.TYPE_NOTIFICATION);
                            Ringtone r = RingtoneManager.getRingtone(getApplicationContext(), notification);
                            r.play();

                            new SweetAlertDialog(context, SweetAlertDialog.SUCCESS_TYPE)
                                    .setTitleText("Pendaftaran Berhasil")
                                    .setContentText("Silahkan login dengan Email dan Password anda")
                                    .setConfirmText("Tutup")
                                    .setConfirmClickListener(new SweetAlertDialog.OnSweetClickListener() {
                                        @Override
                                        public void onClick(SweetAlertDialog sDialog) {
                                            Intent intent= new Intent(Registrasi.this,Login.class);
                                            startActivity(intent);
                                            finish();
                                            sDialog.dismissWithAnimation();
                                        }
                                    })
                                    .show();


                        }else{
                            new SweetAlertDialog(context, SweetAlertDialog.SUCCESS_TYPE)
                                    .setTitleText("Register gagal")
                                    .setContentText(response.body().getMessage())
                                    .setConfirmText("Tutup")
                                    .setConfirmClickListener(new SweetAlertDialog.OnSweetClickListener() {
                                        @Override
                                        public void onClick(SweetAlertDialog sDialog) {
                                            Intent intent= new Intent(Registrasi.this,Login.class);
                                            startActivity(intent);
                                            finish();
                                            sDialog.dismissWithAnimation();
                                        }
                                    })
                                    .show();
                        }
                    }else{
                        Uri notification = RingtoneManager.getDefaultUri(RingtoneManager.TYPE_NOTIFICATION);
                        Ringtone r = RingtoneManager.getRingtone(getApplicationContext(), notification);
                        r.play();

                        try {
                            JSONObject jObjError = new JSONObject(response.errorBody().string());

                            new SweetAlertDialog(context, SweetAlertDialog.WARNING_TYPE)
                                    .setTitleText("Register gagal")
                                    .setContentText(jObjError.getString("message"))
                                    .setConfirmText("Tutup")
                                    .setConfirmClickListener(new SweetAlertDialog.OnSweetClickListener() {
                                        @Override
                                        public void onClick(SweetAlertDialog sDialog) {
                                            //getAccessToken();
                                            sDialog.dismissWithAnimation();
                                        }
                                    })
                                    .show();
                        } catch (JSONException e) {
                            e.printStackTrace();
                        } catch (IOException e) {
                            e.printStackTrace();
                        }
                        //showMessageDialog("Sistem Bermasalah Hubungi Administrator");
                    }
                }

                @Override
                public void onFailure(Call<ResponseUser> call, Throwable t) {
                    /*showProgress(false);*/
                    new SweetAlertDialog(context, SweetAlertDialog.WARNING_TYPE)
                            .setTitleText("Aplikasi Bermasalah")
                            .setContentText("Koneksi / Jaringan Internet Bermasalah")
                            .setConfirmText("Tutup")
                            .setConfirmClickListener(new SweetAlertDialog.OnSweetClickListener() {
                                @Override
                                public void onClick(SweetAlertDialog sDialog) {
                                    //getAccessToken();
                                    sDialog.dismissWithAnimation();
                                }
                            })
                            .show();
                }


            });


        } catch (Exception e) {
            /*showProgress(false);*/
            new SweetAlertDialog(context, SweetAlertDialog.WARNING_TYPE)
                    .setTitleText("Aplikasi Bermasalah")
                    .setContentText("Koneksi / Jaringan Internet Bermasalah")
                    .setConfirmText("Tutup")
                    .setConfirmClickListener(new SweetAlertDialog.OnSweetClickListener() {
                        @Override
                        public void onClick(SweetAlertDialog sDialog) {
                            //getListUser();
                            sDialog.dismissWithAnimation();
                        }
                    })
                    .show();
        }
    }

}
