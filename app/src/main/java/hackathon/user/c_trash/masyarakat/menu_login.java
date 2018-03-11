package hackathon.user.c_trash.masyarakat;

import android.content.Intent;
import android.content.SharedPreferences;
import android.provider.SyncStateContract;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import hackathon.user.c_trash.*;

public class menu_login extends AppCompatActivity {

    EditText user, pass;
    Button enter, daftar;
    RequestQueue requestQueue;
    String loginUrl = "http://192.168.43.216/ctrash/login.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu_login);

        user = (EditText) findViewById(R.id.text_username);
        pass = (EditText) findViewById(R.id.text_password);
        enter = (Button) findViewById(R.id.button_login);
        daftar = (Button) findViewById(R.id.button_daftar);

        enter.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                StringRequest stringRequest = new StringRequest(Request.Method.POST, loginUrl,
                        new Response.Listener<String>() {
                            @Override
                            public void onResponse(String ServerResponse) {

                                if (ServerResponse.equalsIgnoreCase("Data cocok")) {
                                    finish();
                                    Intent intent = new Intent(menu_login.this, menu_utama_masyarakat.class);
                                    startActivity(intent);
                                } else {
                                    Toast.makeText(menu_login.this, ServerResponse, Toast.LENGTH_LONG).show();
                                }
                            }
                        },
                        new Response.ErrorListener() {
                            @Override
                            public void onErrorResponse(VolleyError volleyError) {
                                //Toast.makeText(menu_login.this, volleyError.toString(), Toast.LENGTH_LONG).show();
                            }
                        }) {
                    @Override
                    protected Map<String, String> getParams() {
                        Map<String, String> params = new HashMap<String, String>();
                        params.put("email", user.getText().toString().trim());
                        params.put("password", pass.getText().toString().trim());

                        return params;
                    }
                };
                RequestQueue requestQueue = Volley.newRequestQueue(menu_login.this);
                requestQueue.add(stringRequest);
            }
        });

        daftar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent daftar = new Intent(getApplicationContext(), menu_daftar_masyarakat.class);
                startActivity(daftar);
            }
        });
    }
}
