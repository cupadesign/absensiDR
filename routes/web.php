<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', function () {
    return 'LOGIN BERHASIL';
});

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

/*
|--------------------------------------------------------------------------
| ABSENSI
|--------------------------------------------------------------------------
*/

Route::get('/absensi', function () {
    return view('absensi.index');
});

/*
|--------------------------------------------------------------------------
| USER MOBILE
|--------------------------------------------------------------------------
*/

Route::prefix('user')->group(function () {

    // DASHBOARD
    Route::get('/', function () {
        return view('user.index');
    });

    // HISTORY
    Route::get('/history', function () {
        return view('user.history');
    });

    // ABSEN
    Route::get('/absen', function () {
        return view('user.absen');
    });

    // ABSEN DETAIL
    Route::get('/absen/detail', function () {
        return view('user.absen-detail');
    });

    // INBOX
    Route::get('/inbox', function () {
        return view('user.inbox');
    });

    // PROFILE
    Route::get('/profile', function () {
        return view('user.profile');
    });

});

/*
|--------------------------------------------------------------------------
| TEST
|--------------------------------------------------------------------------
*/

Route::post('/test', function () {
    return 'TEST BERHASIL';
});
