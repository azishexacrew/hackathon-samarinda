<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index(){
      $curl = curl_init();

      $token = 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjRjMWMyMzgwYTA2M2MwZjQ1MWJhMGQyZjNkMDMwNmU4NGU3NzRmY2Y0NDA3NDJjZTI2MTkzOWE5N2IwZjc0OTQxNTk1ZTAyMjI4NTU1NTNhIn0.eyJhdWQiOiIzIiwianRpIjoiNGMxYzIzODBhMDYzYzBmNDUxYmEwZDJmM2QwMzA2ZTg0ZTc3NGZjZjQ0MDc0MmNlMjYxOTM5YTk3YjBmNzQ5NDE1OTVlMDIyMjg1NTU1M2EiLCJpYXQiOjE1MjA2NTU2MzMsIm5iZiI6MTUyMDY1NTYzMywiZXhwIjoxNTUyMTkxNjMzLCJzdWIiOiI0NiIsInNjb3BlcyI6WyJLZWNhbWF0YW4iLCJUZW5hbnQiXX0.CWGAH_60xlLzB_uZAVQl0hbUpqjwP0VQcf23VDGbPmkI4sKMmigGuczBLY_F77hyYAxKgAECHuUwtQ_zjtQ4sZ9NUJXTbTBl81N5prO59NfpzRIY_S9wW1Ywdjx-TBbTg8fMzXaqPwGYEK4J3wOCGCSCtOh6tZZ57ydFd_ZooaME1zXoO6DJH1ovj77goCP7YCTy_zuF8Zyf0uU0xd5TVOoYo5Bj4LSkihP1KUU0Iy_pwKbQK3wpTFaV10tY8ZXKevJRMuYoi8HkJcJ727wzDpVWDz8G0AnqN6a5tmomfreURBNwTOL5ZbclsPDuRAZfDxudXHgVIUYVZz0wwDqMxwgO-V__PurWcAkTzdsgEMR_VKhNDgiqfBVS0KEvBP1O2m2xCJ1EoM-lqaU5OTRyn4OSbrzEg5PHF1fdTUdl-braXGCQ1wFAOxy64h-gjSaZXjiP9JOLr9mxx1cobR1e0ZbNGj7kwLclwXSbRnqO333Bf2fwOg7FAQr_2Eb6362yiugWlNuk9PXnPiW0yNqopPfNakH4eWBhg7xnRcBwNgucmUYR2O9S8jKCFQz63LBc0Lo1LASgXGEel-H12YfwcX3bndwoAc-TlHzzlot2hO5A8sXeBjvFO_d2dKivs_3-HXUDBRSoUDPcb7r138zpTTQaeYvDb5tgvvUgEsiHNwQ' ;

      curl_setopt_array($curl,array(
        CURLOPT_URL => "http://api.samarindakota.go.id/api/v1/citra-niaga/tenant",
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
