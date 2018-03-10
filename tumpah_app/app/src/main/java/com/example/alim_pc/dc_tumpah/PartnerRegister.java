package com.example.alim_pc.dc_tumpah;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Toast;

public class PartnerRegister extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_partner_register);
    }
    public void kembali(View v){
        startActivity(new Intent(PartnerRegister.this, Login.class));
        finish();
    }
    public void btnnextpartner(View v){
        Toast.makeText(getApplicationContext(),"Anda Telah Terdaftar!\nSilahkan Lakukan Proses Login Terlebih Dahulu!", Toast.LENGTH_SHORT).show();
        startActivity((new Intent(PartnerRegister.this, Login.class)));
        finish();
    }
}
