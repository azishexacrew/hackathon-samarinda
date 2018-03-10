package com.trash.poin.poin_trash.fragment;


import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;

import com.google.gson.Gson;
import com.google.gson.GsonBuilder;
import com.ontbee.legacyforks.cn.pedant.SweetAlert.SweetAlertDialog;
import com.trash.poin.poin_trash.R;
import com.trash.poin.poin_trash.activity.Login;
import com.trash.poin.poin_trash.config.Const;
import com.trash.poin.poin_trash.manager.PrefManager;
import com.trash.poin.poin_trash.model.ResponseUser;
import com.trash.poin.poin_trash.model.User;
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

/**
 * A simple {@link Fragment} subclass.
 */
public class ProfilFragment extends BaseFragmentBottomNavigation {

    @BindView(R.id.eNama) EditText eNama;
    @BindView(R.id.eAlamat) EditText eAlamat;
    @BindView(R.id.eEmail) EditText eEmail;
    @BindView(R.id.eKontak) EditText eKontak;
    @BindView(R.id.eTempatLahir) EditText eTempatLahir;
    @BindView(R.id.eTanggalLahir) EditText eTanggalLahir;


    private Retrofit retrofit;
    Context context;
    public ProfilFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_profil, container, false);

        ButterKnife.bind(this, view);
        getDataUser();
        initializeRetrofit();
        return view;
    }


    private void initializeRetrofit(){
        Gson gson = new GsonBuilder()
                .setDateFormat("yyyy-MM-dd HH🇲🇲ss")
                .create();

        retrofit = new Retrofit.Builder()
                .baseUrl(Const.BASE_API_URL)
                .addConverterFactory(GsonConverterFactory.create(gson))
                .build();
    }

    private void setUserProfile(User user,boolean useCache) {
        eNama.setText(user.getName());
        eKontak.setText(user.getKontak());
        eAlamat.setText(user.getAlamat());
        eEmail.setText(user.getEmail());

        /*if(user.getTempatLahir()!=null){
            eTempatLahir.setText(user.getTempatLahir());
        }

        if(user.getTanggalLahir()!=null){
            SimpleDateFormat spf=new SimpleDateFormat("dd/MM/yyyy");
            eTanggalLahir.setText(spf.format(user.getTanggalLahir()).toString());
            myCalendar.setTime(user.getTanggalLahir());
        }


        if(useCache){
            Picasso.with(getContext())
                    .load(Const.BASE_URL +"storage/"+user.getFoto())
                    .resize(500,500)
                    .placeholder(R.drawable.ic_face_black_24dp)
                    .into(profileImage);
        }else{
            Picasso.with(getContext())
                    .load(Const.BASE_URL +"storage/"+user.getFoto())
                    .resize(500,500)
                    .placeholder(R.drawable.ic_face_black_24dp).memoryPolicy(MemoryPolicy.NO_CACHE, MemoryPolicy.NO_STORE)
                    .into(profileImage);
        }*/
    }

    public void getDataUser(){
        //showProgress(true);
        try {
            PrefManager prf = new PrefManager(getContext());

            ApiEndpointService apiService = retrofit.create(ApiEndpointService.class);
            Call<ResponseUser> result = apiService.getUser(
                    "Bearer "+prf.getString("token"));
            result.enqueue(new Callback<ResponseUser>() {
                @Override
                public void onResponse(Call<ResponseUser> call, Response<ResponseUser> response) {
                    //showProgress(false);
                    if(response.isSuccessful() ){
                        if(response.body().getSuccess()){
                            User user=response.body().getUser();
                            setUserProfile(user,true);
                        }
                    }else{

                        try {
                            JSONObject jObjError = new JSONObject(response.errorBody().string());

                            if(jObjError.getString("error").equalsIgnoreCase("token_expired")){
                                new SweetAlertDialog(getContext(), SweetAlertDialog.WARNING_TYPE)
                                        .setTitleText("Aplikasi Bermasalah")
                                        .setContentText("Login anda telah kadaluarsa. Silahkan Login ulang")
                                        .setConfirmText("Login Ulang")
                                        .setConfirmClickListener(new SweetAlertDialog.OnSweetClickListener() {
                                            @Override
                                            public void onClick(SweetAlertDialog sDialog) {
                                                PrefManager prf= new PrefManager(getContext());
                                                prf.remove("token");
                                                Intent intent= new Intent(getActivity(),Login.class);
                                                startActivity(intent);
                                                getActivity().finish();
                                                sDialog.dismissWithAnimation();
                                            }
                                        })
                                        .show();
                            }else{
                                new SweetAlertDialog(getContext(), SweetAlertDialog.WARNING_TYPE)
                                        .setTitleText("Aplikasi Bermasalah")
                                        .setContentText("Respon server bermasalah")
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
                    //showProgress(false);
                    new SweetAlertDialog(getContext(), SweetAlertDialog.WARNING_TYPE)
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
            //showProgress(false);
            new SweetAlertDialog(getContext(), SweetAlertDialog.WARNING_TYPE)
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

    public static ProfilFragment newInstance(int index) {
        ProfilFragment fragment = new ProfilFragment();
        Bundle b = new Bundle();
        b.putInt("index", index);
        fragment.setArguments(b);
        return fragment;
    }



}
