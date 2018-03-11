package hackathon.user.c_trash.masyarakat;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.location.Location;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.util.Base64;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.ByteArrayInputStream;
import java.io.ByteArrayOutputStream;
import java.util.HashMap;
import java.util.Map;

import hackathon.user.c_trash.*;

public class menu_utama_masyarakat extends AppCompatActivity {

    Button btn_gambar, btn_kirim;
    EditText txt_deskripsi;
    Bitmap bitmap, decoded;
    int success;
    int PICK_IMAGE_REQUEST = 1;
    int bitmap_size = 60; // range 1 - 100
    private static final String TAG = MainActivity.class.getSimpleName();

    private String UPLOAD_URL = "http://192.168.43.216/ctrash/upload.php";

    private static final String TAG_SUCCESS = "success";
    private static final String TAG_MESSAGE = "message";
    private String KEY_IMAGE = "image";

    String tag_json_obj = "json_obj_req";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu_utama_masyarakat);


        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        btn_gambar = (Button) findViewById(R.id.button_gambar);
        btn_kirim = (Button) findViewById(R.id.button_kirim);
        txt_deskripsi = (EditText) findViewById(R.id.text_des);

    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_masyarakat, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();


        if (id == R.id.action_sarankritik) {
            Intent saran = new Intent(getApplicationContext(), menu_saran.class);
            startActivity(saran);
            return true;
        }

        if (id == R.id.action_peta) {
            Intent peta = new Intent(getApplicationContext(), peta_masyarakat.class);
            startActivity(peta);
            return true;
        }

        if (id == R.id.action_editprofil) {
            Intent profil = new Intent(getApplicationContext(), menu_profil.class);
            startActivity(profil);
            return true;
        }

        if (id == R.id.action_logout) {
            Intent logout = new Intent(getApplicationContext(), MainActivity.class);
            startActivity(logout);
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
