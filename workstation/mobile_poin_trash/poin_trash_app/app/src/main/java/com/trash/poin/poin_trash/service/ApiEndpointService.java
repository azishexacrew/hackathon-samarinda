package com.trash.poin.poin_trash.service;

import com.trash.poin.poin_trash.model.ResponseResetPassword;
import com.trash.poin.poin_trash.model.ResponseToken;
import com.trash.poin.poin_trash.model.ResponseUser;

import okhttp3.MultipartBody;
import okhttp3.RequestBody;
import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.Header;
import retrofit2.http.Headers;
import retrofit2.http.Multipart;
import retrofit2.http.POST;
import retrofit2.http.Part;
import retrofit2.http.Path;

/**
 * Created by Rifan on 12/07/2017.
 */

public interface ApiEndpointService {

    @FormUrlEncoded
    @POST("token")
    Call<ResponseToken> getAccessToken(@Field("email") String email, @Field("password") String password);

    @FormUrlEncoded
    @POST("users")
    Call<ResponseUser> registerUser(@Field("email") String kontak, @Field("name") String nama, @Field("email") String email, @Field("alamat") String alamat, @Field("password") String password,
                                    @Field("password_confirmation") String password_confirmation);

    @FormUrlEncoded
    @POST("reset_password")
    Call<ResponseResetPassword> resetPassword(@Field("kontak") String kontak, @Field("email") String email);

    @GET("users/show")
    Call<ResponseUser> getUser(@Header("Authorization") String token);

    @Multipart
    @POST("users/update")
    Call<ResponseUser> updateUser(@Header("Authorization") String token,
                                  @Part("name") RequestBody name, @Part("email") RequestBody email, @Part("nik") RequestBody kontak,
                                  @Part("no_sambungan") RequestBody no_sambungan, @Part("pekerjaan") RequestBody pekerjaan,
                                  @Part("alamat") RequestBody alamat,
                                  @Part MultipartBody.Part file);

    @FormUrlEncoded
    @POST("users/password")
    Call<ResponseUser> changePassword(@Header("Authorization") String token, @Field("current-password") String current_password,
                                      @Field("password") String password, @Field("password_confirmation") String password_confirmation);


    //Firebase
    @FormUrlEncoded
    @POST("token_device")
    Call<ResponseUser> setTokenDevice(@Header("Authorization") String token, @Field("token_device") String token_device);
}
