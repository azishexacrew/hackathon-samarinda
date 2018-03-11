<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;
use Auth;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;

class LaporanController extends Controller
{
    public function index(Request $request){

      $client = new Client();
      $response = $client->get(
         'http://api.samarindakota.go.id/api/v1/bank/monografi/perdagangan',
         [
             'headers' => [
               'Content-Type' => 'application/json',
               'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImZhMTcwNThhZGJjMzEwODI4MmI1Y2M1MDU1NDcyY2QyYjMwNWI1NDQzZTAzMTY0ZTkxZGU4YjI5ZTIzOGZjYjE5ZTUzMWM0Y2NkMTlhMWYwIn0.eyJhdWQiOiIzIiwianRpIjoiZmExNzA1OGFkYmMzMTA4MjgyYjVjYzUwNTU0NzJjZDJiMzA1YjU0NDNlMDMxNjRlOTFkZThiMjllMjM4ZmNiMTllNTMxYzRjY2QxOWExZjAiLCJpYXQiOjE1MjA2NTUyNDEsIm5iZiI6MTUyMDY1NTI0MSwiZXhwIjoxNTUyMTkxMjQxLCJzdWIiOiIxMjkiLCJzY29wZXMiOlsiUHJvdmluc2kiLCJLYWJ1cGF0ZW5cL0tvdGEiLCJLZWNhbWF0YW4iLCJLZWx1cmFoYW4iLCJTZWtvbGFoIiwiTW9ub2dyYWZpIiwiRExIIiwiVGVuYW50Il19.GAH_F_kXM-9rXofgw_n97dVpLR9_LPM0N4umBrxiyezga1KWq63CHMPjhDDJEoLFXa1rEoxjuJFQYuZkKrFzKY3E_LHzh96Z4LeSVfU3waINvNovfjyDv7rYKDtDzVWP10U5rjMofx4sUqqgwyG5WywMnA2E51wDjapO1E7nJmWTGvpNY2cC2PtENTZm6_kEyMWvwJUjumtdaQOKshphe8MLiR3Ha8Q6UXgHtDPzG14JoH2LxivCL-h1ttQuSuA0JprlRFYBoJAlf7vX-cf9ixt61dMfnu-7veXHWdJBLjJxbvFUcpDK7MmKZiWfMQHZtArDfZHx-4GJl657JNGSz056MPSm6jok-lUKdiDoVouDMqQWmnq-ByDA-BjfkW2alU_VyabGuwYi44usFVtsl_RbCkJgcwBKTIhS5eSEEmDBfZbmSGUbIr8lF-sYLpk7rQsydkbpaz7Z7Ml4htw5W3cQHzZU-OQWInxhye8NYvZ2pjQjnMTeMGuvZg0nxnY-tqC45tjjazzp7dSgxkGW-MbmRyDsDV2HAfPoWMdKdCcWRVKQ0dsV0LDlkoLJo7NYK1E0ZOljDLl5_2LOCeAISrPMqdYAQOGf50bIVuDiOCPPpnM8dbqMkTcDjA1k33Z4HexZa0Z0_Gk7FSRRsZkynB2dINNjbtoQwPaNug7yHYQ',
             ]
         ]
     )->getBody();

     $contents = (string) $response;
     $apiPerdaganan = json_decode($contents, true);

     $response2 = $client->get(
        'http://api.samarindakota.go.id/api/v1/citra-niaga/tenant',
        [
            'headers' => [
              'Content-Type' => 'application/json',
              'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImZhMTcwNThhZGJjMzEwODI4MmI1Y2M1MDU1NDcyY2QyYjMwNWI1NDQzZTAzMTY0ZTkxZGU4YjI5ZTIzOGZjYjE5ZTUzMWM0Y2NkMTlhMWYwIn0.eyJhdWQiOiIzIiwianRpIjoiZmExNzA1OGFkYmMzMTA4MjgyYjVjYzUwNTU0NzJjZDJiMzA1YjU0NDNlMDMxNjRlOTFkZThiMjllMjM4ZmNiMTllNTMxYzRjY2QxOWExZjAiLCJpYXQiOjE1MjA2NTUyNDEsIm5iZiI6MTUyMDY1NTI0MSwiZXhwIjoxNTUyMTkxMjQxLCJzdWIiOiIxMjkiLCJzY29wZXMiOlsiUHJvdmluc2kiLCJLYWJ1cGF0ZW5cL0tvdGEiLCJLZWNhbWF0YW4iLCJLZWx1cmFoYW4iLCJTZWtvbGFoIiwiTW9ub2dyYWZpIiwiRExIIiwiVGVuYW50Il19.GAH_F_kXM-9rXofgw_n97dVpLR9_LPM0N4umBrxiyezga1KWq63CHMPjhDDJEoLFXa1rEoxjuJFQYuZkKrFzKY3E_LHzh96Z4LeSVfU3waINvNovfjyDv7rYKDtDzVWP10U5rjMofx4sUqqgwyG5WywMnA2E51wDjapO1E7nJmWTGvpNY2cC2PtENTZm6_kEyMWvwJUjumtdaQOKshphe8MLiR3Ha8Q6UXgHtDPzG14JoH2LxivCL-h1ttQuSuA0JprlRFYBoJAlf7vX-cf9ixt61dMfnu-7veXHWdJBLjJxbvFUcpDK7MmKZiWfMQHZtArDfZHx-4GJl657JNGSz056MPSm6jok-lUKdiDoVouDMqQWmnq-ByDA-BjfkW2alU_VyabGuwYi44usFVtsl_RbCkJgcwBKTIhS5eSEEmDBfZbmSGUbIr8lF-sYLpk7rQsydkbpaz7Z7Ml4htw5W3cQHzZU-OQWInxhye8NYvZ2pjQjnMTeMGuvZg0nxnY-tqC45tjjazzp7dSgxkGW-MbmRyDsDV2HAfPoWMdKdCcWRVKQ0dsV0LDlkoLJo7NYK1E0ZOljDLl5_2LOCeAISrPMqdYAQOGf50bIVuDiOCPPpnM8dbqMkTcDjA1k33Z4HexZa0Z0_Gk7FSRRsZkynB2dINNjbtoQwPaNug7yHYQ',
            ]
        ]
    )->getBody();

    $contents2 = (string) $response2;
    $apiCitra = json_decode($contents2, true);

     $term = request('term');
      if($term){
          $term = '%' . $term . '%';
          $sewa->where('kode','LIKE', $term);
      }

      $chartjs = app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July'])
        ->datasets([
            [
                "label" => "My First dataset",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [65, 59, 80, 81, 56, 55, 40],
            ],
            [
                "label" => "My Second dataset",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [12, 33, 44, 44, 55, 23, 40],
            ]
        ])
        ->options([]);

     return view('laporan.index', compact('apiPerdaganan','apiCitra','term','chartjs'));
  }
}
