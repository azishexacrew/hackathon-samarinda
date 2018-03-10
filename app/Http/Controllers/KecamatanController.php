<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index(){
      $curl = curl_init();

      $token = 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjFhYjQ4ZDBmYjQyMzU4MmU3Yjk5YzZhMjAxM2Y5MzBmMDRiZmZhMzY5Nzg3OGU3MmJlMzM0ZjA4OTBhM2RmYmU0NjM5MDJiNzQ4NWM4ZDRiIn0.eyJhdWQiOiIzIiwianRpIjoiMWFiNDhkMGZiNDIzNTgyZTdiOTljNmEyMDEzZjkzMGYwNGJmZmEzNjk3ODc4ZTcyYmUzMzRmMDg5MGEzZGZiZTQ2MzkwMmI3NDg1YzhkNGIiLCJpYXQiOjE1MjA2NTk1NzUsIm5iZiI6MTUyMDY1OTU3NSwiZXhwIjoxNTUyMTk1NTc1LCJzdWIiOiI0NiIsInNjb3BlcyI6WyJLZWNhbWF0YW4iLCJLZWx1cmFoYW4iLCJUZW5hbnQiXX0.BkBhzaSSxPIKfKL-oJwThJo2QIF2qtKVWX1ikJYQLtj_r1SV7fHMAfhem4IxBW_zFI6vLlB2i36OCaz9RGbW-Ik-1WUAgcHEfFWqttxfaoyBKgO5KhHvqGxUg9JTzEdne6L_wW0cG23L9bvFt8-VYL4iqmw0pebgI5ZyoqYJ1esbFKcQnHjhhZ9qJGjnd9lLRU8spMg2ojlNQCZSUVW7sTV3GV1VoslfxBA5ZjStyaaj6AqPS8cl8gebs-lR0U_dbB520es39hTIhkb8_YLZqgT66Tk8A6lKhIDFLmJJeoO660hahGzdiKFVzfwpeACJqMMzvaQ5gg2-CT844Wmtk3BK5kshq7lZJEoL1rht56eThw2gw6Ahx_7O9vDEYyhhQisqyZXTXqfDpKo2au7MfMal80iDv655wcqhbhFUmEtvvBmRbPQuL03Zf2LkpVNhPdyGNm9vPPeBBYlw77BNDgTw8hRhwGw_j3Aix8SRkAkhFmI03RkbVlJxEgnJORuFZt1sPW1FqEW-0eQ0EJbTxV0yb1hNXAkfNy4MTTsNi1PG7mJvU31ad22vQXEkC0L0euStAKCtUm-ZFocXjt8GdHWHoQ5fpk37E7lkCEHZiQA2_aRUeEpUFzL5-i62TYuLAQovI6zYNG1bdEEaRN0p_B2TT8W73iCysg7XhC-T1zI' ;

      curl_setopt_array($curl,array(
        CURLOPT_URL => "http://api.samarindakota.go.id/api/v1/kecamatan",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        // CURLOPT_ENCODING => "",
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array (
          'Content-Type : application/json',
          'Authorization :'.$token,
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);

      if ($err) {
        echo "error = ".$err ;
      }else{
        $json = json_decode($response,true);
        return $json ;
      }
    }
}
