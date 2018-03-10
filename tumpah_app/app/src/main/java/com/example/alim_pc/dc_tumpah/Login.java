package com.example.alim_pc.dc_tumpah;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;



public class Login extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

    }

    public void next(){
        startActivity(new Intent(Login.this, ScanBarcode.class));
        finish();
    }
    EditText username, password;
    public void btnmulai(View v){
        username =(EditText) findViewById(R.id.editText2);
        password = (EditText) findViewById(R.id.editText3);
        if(username.getText().toString().equals("admin") && password.getText().toString().equals("admin")){
            Toast.makeText(getApplicationContext(),"Login Berhasil", Toast.LENGTH_SHORT).show();
            Thread thread = new Thread() {
                public void run() {
                    try {
                        sleep(0);
                    } catch (InterruptedException e) {
                        e.printStackTrace();
                    } finally {
                        next();
                    }
                }
            };
            thread.start();
        }
        else {
            Toast.makeText(getApplicationContext(),"Login Gagal!", Toast.LENGTH_SHORT).show();
        }

    }
    public void btnlupas(View v){
        startActivity(new Intent(Login.this, LupaPassword.class));
        finish();
    }
    public void btndaftar(View v){
        startActivity(new Intent(Login.this, register.class));
        finish();
    }
}
