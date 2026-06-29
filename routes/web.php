<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PenggunaController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', function () {

    return redirect('/login');

});
Route::post(
    '/absensi/check-geofence',
    function () {

        return response()->json([
            'status' => 'OK'
        ]);

    }
);

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get(
    '/login',
    [LoginController::class, 'index']
)->name('login');

Route::post(
    '/login/check-user',
    [LoginController::class, 'checkUser']
);

Route::post(
    '/login',
    [LoginController::class, 'authenticate']
);

Route::post(
    '/create-password',
    [LoginController::class, 'createPassword']
);

Route::post(
    '/logout',
    [LoginController::class, 'logout']
);

/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {

        return view('dashboard.index');

    });

});

/*
|--------------------------------------------------------------------------
| ABSENSI
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/absensi', function () {

        return view('absensi.index');

    });

});
/*
|--------------------------------------------------------------------------
| MASTER RUANGAN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/ruangan',
        [RoomController::class, 'index']
    );

    Route::post(
        '/ruangan/store',
        [RoomController::class, 'store']
    );

});

/*
|--------------------------------------------------------------------------
| KELOLA LAPORAN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/laporan', function () {

        return view('laporan.index');

    });

});


/*--------------------------------------------------------------------------
| KELOLA PENGGUNA
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get(
        '/pengguna',
        [PenggunaController::class, 'index']
    );

});

/*
|--------------------------------------------------------------------------
| USER MOBILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('user')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD USER
        |--------------------------------------------------------------------------
        */

        Route::get('/', function () {

            return view('user.index');

        });

        /*
        |--------------------------------------------------------------------------
        | HISTORY
        |--------------------------------------------------------------------------
        */

        Route::get('/history', function () {

            return view('user.history');

        });

        /*
        |--------------------------------------------------------------------------
        | ABSEN
        |--------------------------------------------------------------------------
        */

        Route::get('/absen', function () {

            return view('user.absen');

        });

        /*
        |--------------------------------------------------------------------------
        | ABSEN DETAIL
        |--------------------------------------------------------------------------
        */

        Route::get('/absen/detail', function () {

            return view('user.absen-detail');

        });

        /*
        |--------------------------------------------------------------------------
        | INBOX
        |--------------------------------------------------------------------------
        */

        Route::get('/inbox', function () {

            return view('user.inbox');

        });

        /*
        |--------------------------------------------------------------------------
        | PROFILE
        |--------------------------------------------------------------------------
        */

        Route::get('/profile', function () {

            return view('user.profile');

        });

        /*
        |--------------------------------------------------------------------------
        | HOME
        |--------------------------------------------------------------------------
        */

        Route::get('/home', function () {

            return view('user.home');

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
