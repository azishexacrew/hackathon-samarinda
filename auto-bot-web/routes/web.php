<?php

Route::get('/', function () {
    return view('admin.layout');
});
Route::get('/login', function () {
    return view('auth.login');
});