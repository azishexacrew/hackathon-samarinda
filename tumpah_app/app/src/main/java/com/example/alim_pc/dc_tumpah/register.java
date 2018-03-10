package com.example.alim_pc.dc_tumpah;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;

public class register extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
    }
    public void btnlogin(View v){
        startActivity(new Intent(register.this, Login.class));
        finish();
    }
    public void btnpengguna(View v){
        startActivity(new Intent(register.this, PenggunaRegestrasi.class));
        finish();
    }
    public void btnbanksampah(View v){
        startActivity(new Intent(register.this, BankSampahRegister.class));
        finish();
    }
    public void btnpartner(View v){
        startActivity(new Intent(register.this, PartnerRegister.class));
        finish();
    }
}
