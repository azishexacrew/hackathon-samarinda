package hackathon.user.c_trash;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import hackathon.user.c_trash.masyarakat.*;
import hackathon.user.c_trash.petugas.*;

public class MainActivity extends AppCompatActivity {

    Button btn_loginm, btn_loginp;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        btn_loginm = (Button) findViewById(R.id.button_masyarakat);
        btn_loginm.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent masyarakat = new Intent(getApplicationContext(), menu_login.class);
                startActivity(masyarakat);
            }
        });


        btn_loginp = (Button) findViewById(R.id.button_petugas);
        btn_loginp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent petugas = new Intent(getApplicationContext(), menu_login_petugas.class);
                startActivity(petugas);
            }
        });


    }
}
