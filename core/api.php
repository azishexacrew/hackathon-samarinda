<?php 

$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjM5M2Y0ZWQ5OGQ5MmNiZmRiMGI4YzAzM2U1ZDY5ZGUyY2Y5MGJkODdlMzZlYzZhNDFjMWQ1MWIwNDdkNTIzM2FkZDU1OTgyNjgxMmUxNTIxIn0.eyJhdWQiOiIzIiwianRpIjoiMzkzZjRlZDk4ZDkyY2JmZGIwYjhjMDMzZTVkNjlkZTJjZjkwYmQ4N2UzNmVjNmE0MWMxZDUxYjA0N2Q1MjMzYWRkNTU5ODI2ODEyZTE1MjEiLCJpYXQiOjE1MjAzMDMxNjEsIm5iZiI6MTUyMDMwMzE2MSwiZXhwIjoxNTUxODM5MTYxLCJzdWIiOiIxMjciLCJzY29wZXMiOlsiUHJvdmluc2kiLCJLYWJ1cGF0ZW5cL0tvdGEiLCJLZWNhbWF0YW4iLCJLZWx1cmFoYW4iLCJTZWtvbGFoIl19.WHVVKzLsuA7pCo3P9Tre1nrmM_sMqQac9DtRFAnXdx1NGOPHAcMJ_lNy6zYURou-N42GesSQWDQx1AhKcK655QbN5yLixpCWkACM3X4G28rTxGirQDOdQ1GBCjLg06ED1aE-0sHBlr0tSd-eFQrnoLbEp8b49LeaVD2xXDeszh014inu42pFceLpMrD4qDeMlinh9BX7YuwTCwI9oifc_UyL3jf9Osf3zlJ_eboYJ_H331UGUv4hzIvKu_UR0CSj25i38n7c-FvktN8z3byKQ8Ho3KgbeWKgBHm4ZRzhsLp9y4OHBPx5wlZLWWNVzCm_KttXntLCMmPRufejb1ih9-jAO8HAC3tsQCmFa7svBT5V26XxNAZO4k0VM_3A00ftpwzKq7eMZM4Q1ehCdxHk6j7uTzHSsQ2l-nog58TTEoqCo6qbeZh48yT0ajTYocUN2fHadw9pPxHzdzunOUYFGidiIFNSEMnO-dJI4kQtFd-dmFe1ENA4vY3kDSgUY4zPdubuRT50GoXrB20FtHp2Vy1XKeIxI0nCREtUCV2YkEbxd4oySstZ7B1f9G5QVJgd4MM1IRWnVjgjtWtt7LxWWN2LQKGdyF9qVN3qgozptosCJG0BbVuCHo0zUYF9s-q2GtUqpyPqf7G4acpjRPGkWETexI5sDmM5kBmks3Tzo6w";

function exec_curl($token, $url){
	$header = array(
            "Content-Type: application/json",
            'Authorization: Bearer '.$token
    );

    $curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
	curl_setopt($curl, CURLOPT_HTTPGET, 1); 
	 
	$json_response = curl_exec($curl);
	 
	curl_close($curl);

	return $json_response;
}

function get_kecamatan($token){
	return exec_curl($token, "http://api.samarindakota.go.id/api/v1/kecamatan?idKota=6472");
}

function get_kecamatan_id($token, $id){
	return exec_curl($token, "http://api.samarindakota.go.id/api/v1/kecamatan?idKota=$id");
}

function get_kecamatan_name($token, $nama){
	$nama = str_replace(" ", "%20", $nama);
	return exec_curl($token, "http://api.samarindakota.go.id/api/v1/kecamatan?nama=$nama");	
}

function get_kelurahan($token){
	return exec_curl($token, "http://api.samarindakota.go.id/api/v1/kelurahan");
}

function get_kelurahan_id($token, $id){
	return exec_curl($token, "http://api.samarindakota.go.id/api/v1/kelurahan?id=$id");
}

function get_kelurahan_name($token, $nama){
	$nama = str_replace(" ", "%20", $nama);
	return exec_curl($token, "http://api.samarindakota.go.id/api/v1/kelurahan?nama=$nama");
}

// print_r( get_kelurahan_name($token, "lempake"));
?>