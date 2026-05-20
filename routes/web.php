<?php

use Illuminate\Support\Facades\Route;
//Dashboard user
Route::get('/dashboard', function () {
    return view('dashboard.index');
});

//Halaman awal web
Route::get('/', function () {
    return view('home');
});
//Halaman LOGIN
Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function () {
    return 'LOGIN BERHASIL';
});

Route::post('/test', function () {
    return 'TEST BERHASIL';
});
//Halaman User index
Route::get('/user', function () {
    return view('user.index');
});
