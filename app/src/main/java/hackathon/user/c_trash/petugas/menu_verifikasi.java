package hackathon.user.c_trash.petugas;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
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

import hackathon.user.c_trash.R;
import hackathon.user.c_trash.masyarakat.menu_daftar_masyarakat;
import hackathon.user.c_trash.masyarakat.menu_login;

public class menu_verifikasi extends AppCompatActivity {

    TextView title, status;
    Button verifikasi;

    RequestQueue requestQueue;
    String update = "http://192.168.43.216/ctrash/updatemarkers.php";
String ubah = "Sudah";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu_verifikasi);

        verifikasi = (Button) findViewById(R.id.btn_verif);
        title = (TextView) findViewById(R.id.text_title);
        status = (TextView) findViewById(R.id.text_status);

        requestQueue = Volley.newRequestQueue(getApplicationContext());

        Bundle extras = getIntent().getExtras();
        final String nama = extras.getString("name");
        final String statusa = extras.getString("status");

        title.setText("Nama :  " + nama);
        status.setText(statusa);

        if (statusa.equals("Sudah")){
            verifikasi.setEnabled(false);
        } else if (statusa.equals("Belum")){
            verifikasi.setEnabled(true);
        }

        verifikasi.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                StringRequest request = new StringRequest(Request.Method.POST, update,
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
                        parameters.put("tipe", ubah);
                        parameters.put("nm_obyek", nama);
                        return parameters;
                    }
                };

                requestQueue.add(request);
                Toast.makeText(menu_verifikasi.this, "Verifikasi Sukses", Toast.LENGTH_LONG).show();
                Intent intent = new Intent(menu_verifikasi.this, peta_petugas.class);
                startActivity(intent);

            }
        });


    }
}
