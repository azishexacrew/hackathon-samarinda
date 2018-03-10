package com.example.alim_pc.dc_tumpah;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Toast;

public class PenggunaRegestrasi extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pengguna_regestrasi);
    }
    public void kembali(View v){
        startActivity(new Intent(PenggunaRegestrasi.this, Login.class));
        finish();
    }
    public void btnnextuser(View v){
        Toast.makeText(getApplicationContext(),"Anda Telah Terdaftar!\nSilahkan Lakukan Proses Login Terlebih Dahulu!", Toast.LENGTH_SHORT).show();
        startActivity((new Intent(PenggunaRegestrasi.this, Login.class)));
        finish();

    }
}
