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
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.ontbee.legacyforks.cn.pedant.SweetAlert.SweetAlertDialog;
import com.trash.poin.poin_trash.R;
import com.trash.poin.poin_trash.config.Const;
import com.trash.poin.poin_trash.manager.PrefManager;
import com.trash.poin.poin_trash.model.ResponseToken;
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

public class Login extends AppCompatActivity {

    private Button btnRegister,btnLogin;
    Retrofit retrofit;
    Context context;
    @BindView(R.id.email) EditText eEmail;
    @BindView(R.id.password) EditText ePassword;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login_activity);
        ButterKnife.bind(this);
        context=this;
        initialLayout();
        initializeRetrofit();

        PrefManager prf = new PrefManager(getApplicationContext());
        if(!prf.getString("token").equals("")){
            startMainActivity();
        }
    }

    private void initialLayout() {

        btnRegister = (Button) findViewById(R.id.register_button);
        btnRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                registerActivity();
            }
        });
        btnLogin = (Button) findViewById(R.id.email_sign_up_button);
        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                getAccessToken(eEmail.getText().toString(),ePassword.getText().toString());
            }
        });

    }

    private void registerActivity() {
        Intent intent= new Intent(Login.this,Registrasi.class);
        startActivity(intent);
    }

    private void initializeRetrofit(){
        retrofit = new Retrofit.Builder()
                .baseUrl(Const.BASE_API_URL)
                .addConverterFactory(GsonConverterFactory.create())
                .build();
    }

    public void getAccessToken(String email,String password){
        try {
            ApiEndpointService apiService = retrofit.create(ApiEndpointService.class);
            Call<ResponseToken> result = apiService.getAccessToken(email,password);
            result.enqueue(new Callback<ResponseToken>() {
                @Override
                public void onResponse(Call<ResponseToken> call, Response<ResponseToken> response) {
                    /*showProgress(false);*/
                    if(response.isSuccessful()){
                        if(response.body().getSuccess()){

                            PrefManager prf= new PrefManager(getApplicationContext());
                            prf.setString("token",response.body().getData().getToken());

                            /*ApiEndpointService apiService = retrofit.create(ApiEndpointService.class);
                            Call<ResponseUser> result = apiService.setTokenDevice("Bearer "+prf.getString("token"),FirebaseInstanceId.getInstance().getToken());
                            result.enqueue(new Callback<ResponseUser>() {
                                @Override
                                public void onResponse(Call<ResponseUser> call, Response<ResponseUser> response) {
                                    if(response.isSuccessful()){
                                        Log.v("AFTER LOGIN","Hassan : "+response.body().getMessage());
                                    }
                                }

                                @Override
                                public void onFailure(Call<ResponseUser> call, Throwable t) {
                                    *//*Snackbar snackbar = Snackbar
                                            .make(relativeLayout, "No internet connection!", Snackbar.LENGTH_INDEFINITE)
                                            .setAction("RETRY", new View.OnClickListener() {
                                                @Override
                                                public void onClick(View view) {
                                                    getComment();
                                                }
                                            });
                                    snackbar.setActionTextColor(Color.RED);
                                    View sbView = snackbar.getView();
                                    TextView textView = (TextView) sbView.findViewById(android.support.design.R.id.snackbar_text);
                                    textView.setTextColor(Color.YELLOW);
                                    snackbar.show();*//*
                                }
                            });*/

                            startMainActivity();
                        }else{
                            Uri notification = RingtoneManager.getDefaultUri(RingtoneManager.TYPE_NOTIFICATION);
                            Ringtone r = RingtoneManager.getRingtone(getApplicationContext(), notification);
                            r.play();
                            //showMessageDialog(response.body().getMessage());
                        }
                    }else{
                        Uri notification = RingtoneManager.getDefaultUri(RingtoneManager.TYPE_NOTIFICATION);
                        Ringtone r = RingtoneManager.getRingtone(getApplicationContext(), notification);
                        r.play();
                        try {
                            JSONObject jObjError = new JSONObject(response.errorBody().string());

                            new SweetAlertDialog(context, SweetAlertDialog.WARNING_TYPE)
                                    .setTitleText("Login gagal")
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
                    }
                }

                @Override
                public void onFailure(Call<ResponseToken> call, Throwable t) {
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

    private void startMainActivity() {
        Intent intent= new Intent(Login.this,Dashboard.class);
        startActivity(intent);
    }
}
