package hackathon.user.c_trash.masyarakat;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
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

public class menu_saran extends AppCompatActivity {

    Button btn_kirim;
    EditText txt_judul, txt_deskripsi;

    String nik = "123";

    RequestQueue requestQueue;
    String insertUrl = "http://192.168.43.216/ctrash/insertsaran.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu_saran);

        txt_judul = (EditText) findViewById(R.id.text_judul);
        txt_deskripsi = (EditText) findViewById(R.id.text_deskripsi);

        requestQueue = Volley.newRequestQueue(getApplicationContext());

        btn_kirim = (Button) findViewById(R.id.button_kirim);

        btn_kirim.setOnClickListener(new View.OnClickListener() {
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
                        parameters.put("nik", nik);
                        parameters.put("judul", txt_judul.getText().toString());
                        parameters.put("deskripsi", txt_deskripsi.getText().toString());

                        return parameters;

                    }
                };

                requestQueue.add(request);
                Toast.makeText(menu_saran.this, "Kritik dan Saran anda dikirimkan", Toast.LENGTH_LONG).show();
                Intent back = new Intent(getApplicationContext(), menu_utama_masyarakat.class);
                startActivity(back);
            }
        });
    }
}
