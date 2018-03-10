package hackathon.user.c_trash.petugas;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import hackathon.user.c_trash.*;

public class menu_login_petugas extends AppCompatActivity {

    EditText txt_user, txt_pass;
    Button btn_login;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu_login_petugas);

        txt_user = (EditText) findViewById(R.id.text_username);
        txt_pass = (EditText) findViewById(R.id.text_password);

        btn_login = (Button) findViewById(R.id.button_login);

        btn_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent login = new Intent(getApplicationContext(), menu_utama_petugas.class);
                startActivity(login);
            }
        });
    }
}
