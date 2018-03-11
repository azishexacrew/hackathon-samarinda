<?php 
session_start();
if(isset($_SESSION['id'])){
	$id=$_SESSION['id'];	
}


define("BASE_URL", "http://localhost/Tong-Sampah");

function cek_login(){
	if($_SESSION['id'] == ""){
		header("Location: ".BASE_URL. "/");
	}
}

function is_admin(){
	if($_SESSION['level'] != 1){
		header("Location: ".BASE_URL. "/");
	}	
}
