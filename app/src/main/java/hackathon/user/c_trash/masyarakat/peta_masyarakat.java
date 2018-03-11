package hackathon.user.c_trash.masyarakat;

import android.content.Intent;
import android.location.Location;
import android.support.v4.app.FragmentActivity;
import android.os.Bundle;
import android.util.Log;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Spinner;
import android.widget.Toast;

import hackathon.user.c_trash.*;
import hackathon.user.c_trash.petugas.menu_login_petugas;
import hackathon.user.c_trash.petugas.menu_utama_petugas;
import hackathon.user.c_trash.petugas.menu_verifikasi;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.MapFragment;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.CameraPosition;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class peta_masyarakat extends FragmentActivity implements OnMapReadyCallback {

    MapFragment mapFragment;
    GoogleMap gMap;
    MarkerOptions markerOptions = new MarkerOptions();
    CameraPosition cameraPosition;
    LatLng latLng, here;
    String title, desk, tipe;
    Spinner filter;

    //public static final String ID = "id";
    public static final String TITLE = "nm_obyek";
    public static final String LAT = "lat";
    public static final String LON = "lon";
    public static final String DESK = "deskripsi";
    public static final String TIPE = "tipe";

    private String url = "http://192.168.43.216/ctrash/markers.php"; //nanti dihosting masih localhost
    String tag_json_obj = "json_obj_req";

    private gpstracker gpsTracker;
    private Location mLocation;
    double latitude, longitude;

    private String array_spinner[];

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_peta_masyarakat);
        mapFragment = (MapFragment) getFragmentManager().findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);


        gpsTracker = new gpstracker(getApplicationContext());
        mLocation = gpsTracker.getLocation();

        latitude = mLocation.getLatitude();
        longitude = mLocation.getLongitude();

        array_spinner=new String[4];
        array_spinner[0]="Semua";
        array_spinner[1]="Bersih";
        array_spinner[2]="Kotor";
        array_spinner[3]="Keluhan";

        filter = (Spinner) findViewById(R.id.spinner);
        ArrayAdapter adapter = new ArrayAdapter(this, android.R.layout.simple_spinner_item, array_spinner);
        filter.setAdapter(adapter);

    }


    @Override
    public void onMapReady(GoogleMap googleMap) {
        gMap = googleMap;
        gMap.setMapType(GoogleMap.MAP_TYPE_NORMAL);
        here = new LatLng(latitude, longitude);
        gMap.addMarker(new MarkerOptions().position(here).title("Aku disini"));

        cameraPosition = new CameraPosition.Builder().target(here).zoom(20).build();
        googleMap.animateCamera(CameraUpdateFactory.newCameraPosition(cameraPosition));

        getMarkers();
    }

    private void addMarker(LatLng latlng, final String title, final String desk) {
        //if (tipe.equals("Sudah")) {
            markerOptions.icon(BitmapDescriptorFactory.defaultMarker(BitmapDescriptorFactory.HUE_ORANGE));
        //} else if (tipe.equals("Belum")) {
        //   markerOptions.icon(BitmapDescriptorFactory.defaultMarker(BitmapDescriptorFactory.HUE_BLUE));
        //}

        markerOptions.position(latlng);
        markerOptions.title(title);
        markerOptions.snippet(desk);
        gMap.addMarker(markerOptions);

        gMap.setOnInfoWindowClickListener(new GoogleMap.OnInfoWindowClickListener() {
            @Override
            public void onInfoWindowClick(Marker marker) {

                Toast.makeText(getApplicationContext(), marker.getTitle(), Toast.LENGTH_SHORT).show();
            }
        });
    }

    private void getMarkers() {
        StringRequest strReq = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {

            @Override
            public void onResponse(String response) {
                Log.e("Response: ", response.toString());

                try {
                    JSONObject jObj = new JSONObject(response);
                    String getObject = jObj.getString("obyek");
                    JSONArray jsonArray = new JSONArray(getObject);

                    for (int i = 0; i < jsonArray.length(); i++) {
                        JSONObject jsonObject = jsonArray.getJSONObject(i);
                        title = jsonObject.getString(TITLE);
                        desk = jsonObject.getString(DESK);
                        tipe = jsonObject.getString(TIPE);
                        latLng = new LatLng(Double.parseDouble(jsonObject.getString(LAT)), Double.parseDouble(jsonObject.getString(LON)));

                        addMarker(latLng, title, desk);
                    }

                } catch (JSONException e) {
                    e.printStackTrace();
                }

            }
        }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e("Error: ", error.getMessage());
                Toast.makeText(peta_masyarakat.this, error.getMessage(), Toast.LENGTH_LONG).show();
            }
        });

        AppController.getInstance().addToRequestQueue(strReq, tag_json_obj);
    }

}
