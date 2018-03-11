package hackathon.user.c_trash.masyarakat;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;

import hackathon.user.c_trash.*;

public class menu_daftar_masyarakat extends AppCompatActivity {

    EditText txt_nik, txt_nama, txt_ttl, txt_email, txt_password;
    RadioButton rbLaki, rbPerempuan;
    Button btn_daftar;
    String jenis_kel;

    RequestQueue requestQueue;
    String insertUrl = "http://192.168.43.216/ctrash/insert.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu_daftar_masyarakat);

        txt_nik = (EditText) findViewById(R.id.text_nik);
        txt_nama = (EditText) findViewById(R.id.text_nama);
        txt_ttl = (EditText) findViewById(R.id.text_ttl);
        txt_email = (EditText) findViewById(R.id.text_email);
        txt_password = (EditText) findViewById(R.id.text_password);
        rbLaki = (RadioButton) findViewById(R.id.rbLaki);
        rbPerempuan = (RadioButton) findViewById(R.id.rbPerempuan);
        btn_daftar = (Button) findViewById(R.id.button_daftar);

        requestQueue = Volley.newRequestQueue(getApplicationContext());

        btn_daftar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                StringRequest request = new StringRequest(Request.Method.POST, insertUrl,
                        new Response.Listener<String>() {
                            @Override
                            public void onResponse(String response) {

                            }
                        }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                    }
                }) {
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {
                        Map<String, String> parameters = new HashMap<String, String>();
                        parameters.put("nik", txt_nik.getText().toString());
                        parameters.put("nama_penduduk", txt_nama.getText().toString());
                        parameters.put("ttl", txt_ttl.getText().toString());
                        if (rbLaki.isChecked() ==true){
                            jenis_kel = "L";
                        } else if(rbPerempuan.isChecked()== true){
                            jenis_kel = "P";
                        }
                        parameters.put("jk", jenis_kel);
                        parameters.put("email", txt_email.getText().toString());
                        parameters.put("password", txt_password.getText().toString());

                        return parameters;

                    }
                };

                requestQueue.add(request);
                Toast.makeText(menu_daftar_masyarakat.this, "Daftar Sukses", Toast.LENGTH_LONG).show();
                Intent intent = new Intent(menu_daftar_masyarakat.this, menu_login.class);
                startActivity(intent);

            }
        });
    }
}
