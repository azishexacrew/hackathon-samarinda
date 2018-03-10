package hackathon.user.c_trash.masyarakat;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;

import hackathon.user.c_trash.*;

public class menu_utama_masyarakat extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu_utama_masyarakat);

        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
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

        if (id == R.id.action_logout) {
            Intent login = new Intent(getApplicationContext(), MainActivity.class);
            startActivity(login);
            return true;
        }

        if (id == R.id.action_sarankritik) {
            Intent saran = new Intent(getApplicationContext(), menu_saran.class);
            startActivity(saran);
            return true;
        }

        if (id == R.id.action_logout) {
            System.exit(1);
            return true;
        }

        if (id == R.id.action_peta) {
            Intent login = new Intent(getApplicationContext(), peta_masyarakat.class);
            startActivity(login);
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
