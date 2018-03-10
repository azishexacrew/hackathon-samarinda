package com.trash.poin.poin_trash.fragment;


import android.content.Context;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

import com.ontbee.legacyforks.cn.pedant.SweetAlert.SweetAlertDialog;
import com.trash.poin.poin_trash.R;
import com.trash.poin.poin_trash.activity.BankSampahLokasiMaps;
import com.trash.poin.poin_trash.activity.Login;
import com.trash.poin.poin_trash.adapter.AdapterBankSampah;
import com.trash.poin.poin_trash.config.Const;
import com.trash.poin.poin_trash.manager.PrefManager;
import com.trash.poin.poin_trash.model.ResponseBankSampah;
import com.trash.poin.poin_trash.service.ApiEndpointService;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

/**
 * A simple {@link Fragment} subclass.
 */
public class DaftarBankSampahFragment extends BaseFragmentBottomNavigation {

    private OnFragmentInteractionListener mListener;
    private GridLayoutManager lLayout;
    Context context;
    private RecyclerView recyclerView;
    private Retrofit retrofit;
    Button maps;

    public DaftarBankSampahFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        View view = inflater.inflate(R.layout.fragment_daftar_bank_sampah, container, false);
        context=getActivity();
        initializeRetrofit();
        lLayout = new GridLayoutManager(getContext(), 1, GridLayoutManager.VERTICAL, false);

//        maps = view.findViewById(R.id.)
        recyclerView = view.findViewById(R.id.recycler_view);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(lLayout);

//        maps = view.findViewById(R.id.maps);
//        maps.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//                Intent intent = new Intent(getActivity(), BankSampahLokasiMaps.class);
//                startActivity(intent);
//            }
//        });

        getBankSampah(context);

        // Inflate the layout for this fragment
        return view;
    }

    public void getBankSampah(final Context context){
        //showProgress(true);
        try {
            ApiEndpointService apiService = retrofit.create(ApiEndpointService.class);
            Call<ResponseBankSampah> result = apiService.getBankSampah();
            result.enqueue(new Callback<ResponseBankSampah>() {
                @Override
                public void onResponse(Call<ResponseBankSampah> call, Response<ResponseBankSampah> response) {
                    //showProgress(false);
                    if(response.isSuccessful() ){
                        if(response.body().getSuccess()){
                            recyclerView.setAdapter(new AdapterBankSampah(context,response.body().getData()));
                        }else{

                        }
                    }else{

                        try {
                            JSONObject jObjError = new JSONObject(response.errorBody().string());

                            if(jObjError.getString("error").equalsIgnoreCase("token_expired")){
                                new SweetAlertDialog(context, SweetAlertDialog.WARNING_TYPE)
                                        .setTitleText("Aplikasi Bermasalah")
                                        .setContentText("Login anda telah kadaluarsa. Silahkan Login ulang")
                                        .setConfirmText("Login Ulang")
                                        .setConfirmClickListener(new SweetAlertDialog.OnSweetClickListener() {
                                            @Override
                                            public void onClick(SweetAlertDialog sDialog) {
                                                PrefManager prf= new PrefManager(context);
                                                prf.remove("token");
                                                Intent intent= new Intent(getActivity(),Login.class);
                                                startActivity(intent);
                                                getActivity().finish();
                                                sDialog.dismissWithAnimation();
                                            }
                                        })
                                        .show();
                            }else{
                                new SweetAlertDialog(context, SweetAlertDialog.WARNING_TYPE)
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
                public void onFailure(Call<ResponseBankSampah> call, Throwable t) {
                    //showProgress(false);
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
            //showProgress(false);
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

    // TODO: Rename method, update argument and hook method into UI event
    public void onButtonPressed(Uri uri) {
        if (mListener != null) {
            mListener.onFragmentInteraction(uri);
        }
    }

    private void initializeRetrofit(){
        retrofit = new Retrofit.Builder()
                .baseUrl(Const.BASE_API_URL)
                .addConverterFactory(GsonConverterFactory.create())
                .build();
    }


    public interface OnFragmentInteractionListener {
        // TODO: Update argument type and name
        void onFragmentInteraction(Uri uri);
    }

    public static DaftarBankSampahFragment newInstance(int index) {
        DaftarBankSampahFragment fragment = new DaftarBankSampahFragment();
        Bundle b = new Bundle();
        b.putInt("index", index);
        fragment.setArguments(b);
        return fragment;
    }
}
