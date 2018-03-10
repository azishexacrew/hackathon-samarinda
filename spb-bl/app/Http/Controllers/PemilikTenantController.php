<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;
use App\PemilikTenant;

class PemilikTenantController extends Controller
{
  public function index()
  {
      $active = 'pemilik';
      $tenant = PemilikTenant::orderBy('id','desc');
      $term = request('term');
      if($term){
          $term = '%' . $term . '%';
          $tenant->where('area','LIKE',$term)->orwhere('no_identitas','LIKE',$term);
      }
      $tenant = $tenant->paginate(20);
      return view('tenant.index', compact('tenant'));
  }

  public function create()
  {
      return $this->form();
  }

  public function store(Request $request)
  {
      return $this->save($request);
  }

  public function edit($id)
  {
      return $this->form($id);
  }

  public function update(Request $request, $id)
  {
      return $this->save($request, $id);
  }

  public function form($id = null)
  {
      if($id){
          $tenant = PemilikTenant::find($id);
          if($tenant){
              session()->flash('_old_input', array_merge($tenant->toArray(), old()));
          }
      }
      $active = 'pemilik';

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

       $response2 = $client->get(
          'http://api.samarindakota.go.id/api/v1/bank/monografi/pariwisata',
          [
              'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImZhMTcwNThhZGJjMzEwODI4MmI1Y2M1MDU1NDcyY2QyYjMwNWI1NDQzZTAzMTY0ZTkxZGU4YjI5ZTIzOGZjYjE5ZTUzMWM0Y2NkMTlhMWYwIn0.eyJhdWQiOiIzIiwianRpIjoiZmExNzA1OGFkYmMzMTA4MjgyYjVjYzUwNTU0NzJjZDJiMzA1YjU0NDNlMDMxNjRlOTFkZThiMjllMjM4ZmNiMTllNTMxYzRjY2QxOWExZjAiLCJpYXQiOjE1MjA2NTUyNDEsIm5iZiI6MTUyMDY1NTI0MSwiZXhwIjoxNTUyMTkxMjQxLCJzdWIiOiIxMjkiLCJzY29wZXMiOlsiUHJvdmluc2kiLCJLYWJ1cGF0ZW5cL0tvdGEiLCJLZWNhbWF0YW4iLCJLZWx1cmFoYW4iLCJTZWtvbGFoIiwiTW9ub2dyYWZpIiwiRExIIiwiVGVuYW50Il19.GAH_F_kXM-9rXofgw_n97dVpLR9_LPM0N4umBrxiyezga1KWq63CHMPjhDDJEoLFXa1rEoxjuJFQYuZkKrFzKY3E_LHzh96Z4LeSVfU3waINvNovfjyDv7rYKDtDzVWP10U5rjMofx4sUqqgwyG5WywMnA2E51wDjapO1E7nJmWTGvpNY2cC2PtENTZm6_kEyMWvwJUjumtdaQOKshphe8MLiR3Ha8Q6UXgHtDPzG14JoH2LxivCL-h1ttQuSuA0JprlRFYBoJAlf7vX-cf9ixt61dMfnu-7veXHWdJBLjJxbvFUcpDK7MmKZiWfMQHZtArDfZHx-4GJl657JNGSz056MPSm6jok-lUKdiDoVouDMqQWmnq-ByDA-BjfkW2alU_VyabGuwYi44usFVtsl_RbCkJgcwBKTIhS5eSEEmDBfZbmSGUbIr8lF-sYLpk7rQsydkbpaz7Z7Ml4htw5W3cQHzZU-OQWInxhye8NYvZ2pjQjnMTeMGuvZg0nxnY-tqC45tjjazzp7dSgxkGW-MbmRyDsDV2HAfPoWMdKdCcWRVKQ0dsV0LDlkoLJo7NYK1E0ZOljDLl5_2LOCeAISrPMqdYAQOGf50bIVuDiOCPPpnM8dbqMkTcDjA1k33Z4HexZa0Z0_Gk7FSRRsZkynB2dINNjbtoQwPaNug7yHYQ',
              ]
          ]
      )->getBody();

      $contents = (string) $response;
       $contents2 = (string) $response2;
       $apiArea = json_decode($contents, true);
       $apiArea2 = json_decode($contents2, true);

      // dd($apiArea);
      $action = route('webpemilik::tenant.' . ($id ? 'update' : 'store'), $id);
      $method = $id ? 'PUT' : 'POST';
      return view('tenant.form' , compact('apiArea','apiArea2','action','method'));
  }

  public function save($request, $id = null)
  {
      if($id){
          $tenant = PemilikTenant::find($id);
      }else{
          $tenant = new PemilikTenant;
      }

      $this->validate($request, [
          'area' => 'required',
          'blok' => 'required',
          'nomor' => 'required',
          'luas' => 'required',
          'harga' => 'required',
      ]);

      $tenant->area = request('area');
      $tenant->blok = request('blok');
      $tenant->nomor = request('nomor');
      $tenant->luas = request('luas');
      $tenant->harga = request('harga');
      $tenant->pemilik_id = '8';
      $tenant->harga = request('harga');

      $tenant->save();

      return redirect(route('webpemilik::tenant.index'));

  }

  public function show(){

  }

  public function destroy($id)
  {
      $tenant = PemilikTenant::find($id);
      $tenant->delete();
      return redirect(route('webpemilik::tenant.index'));
  }
}
