package hackathon.user.c_trash.petugas;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;

import hackathon.user.c_trash.*;
import hackathon.user.c_trash.masyarakat.menu_login;
import hackathon.user.c_trash.masyarakat.menu_utama_masyarakat;

public class menu_login_petugas extends AppCompatActivity {

    EditText txt_user, txt_pass;
    Button btn_login;

    RequestQueue requestQueue;
    String loginUrl = "http://192.168.43.216/ctrash/loginpetugas.php";

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
                StringRequest stringRequest = new StringRequest(Request.Method.POST, loginUrl,
                        new Response.Listener<String>() {
                            @Override
                            public void onResponse(String ServerResponse) {

                                if (ServerResponse.equalsIgnoreCase("Data cocok")) {
                                    finish();
                                    Intent intent = new Intent(menu_login_petugas.this, menu_utama_petugas.class);
                                    startActivity(intent);
                                } else {
                                    Toast.makeText(menu_login_petugas.this, ServerResponse, Toast.LENGTH_LONG).show();
                                }
                            }
                        },
                        new Response.ErrorListener() {
                            @Override
                            public void onErrorResponse(VolleyError volleyError) {
                                //Toast.makeText(menu_login_petugas.this, volleyError.toString(), Toast.LENGTH_LONG).show();
                            }
                        }) {
                    @Override
                    protected Map<String, String> getParams() {
                        Map<String, String> params = new HashMap<String, String>();
                        params.put("email", txt_user.getText().toString().trim());
                        params.put("password", txt_pass.getText().toString().trim());

                        return params;
                    }
                };
                RequestQueue requestQueue = Volley.newRequestQueue(menu_login_petugas.this);
                requestQueue.add(stringRequest);
            }
        });
    }
}
