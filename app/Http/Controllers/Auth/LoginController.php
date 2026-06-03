<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN LOGIN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        if (Auth::check()) {

            if (Auth::user()->ROLE === 'admin') {

                return redirect('/dashboard');

            }

            return redirect('/user');

        }

        return view('auth.login');
    }

    /*
    |--------------------------------------------------------------------------
    | CEK USERNAME
    |--------------------------------------------------------------------------
    */

    public function checkUser(Request $request)
    {
        $request->validate([

            'USERNAME' => 'required',

        ]);

        /*
        |--------------------------------------------------------------------------
        | CEK USER LOKAL DULU
        |--------------------------------------------------------------------------
        */

        $user = User::where(
            'USERNAME',
            $request->USERNAME
        )->first();

        /*
        |--------------------------------------------------------------------------
        | KALAU USER SUDAH ADA DI LOKAL
        |--------------------------------------------------------------------------
        */

        if ($user) {

            /*
            |--------------------------------------------------------------------------
            | BELUM PUNYA PASSWORD
            |--------------------------------------------------------------------------
            */

            if (!$user->PASSWORD) {

                return view('auth.create-password', [

                    'user' => $user

                ]);

            }

            /*
            |--------------------------------------------------------------------------
            | SUDAH PUNYA PASSWORD
            |--------------------------------------------------------------------------
            */

            return view('auth.password-login', [

                'user' => $user

            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | CEK USER DI SIMGOS
        |--------------------------------------------------------------------------
        */

        $simgosUser = DB::connection('aplikasi')
            ->table('pengguna')
            ->where('LOGIN', $request->USERNAME)
            ->first();

        /*
        |--------------------------------------------------------------------------
        | USER TIDAK DITEMUKAN
        |--------------------------------------------------------------------------
        */

        if (!$simgosUser) {

            return back()->with(
                'error',
                'Username tidak ditemukan'
            );

        }

        /*
        |--------------------------------------------------------------------------
        | IMPORT USER BARU
        |--------------------------------------------------------------------------
        */

        $user = User::create([

            'USERNAME'  => $simgosUser->LOGIN,

            'NAMA'      => $simgosUser->NAMA,

            'NIP'       => $simgosUser->NIP,

            'SIMGOS_ID' => $simgosUser->ID,

            'ROLE'      => 'pegawai',

            'IS_ACTIVE' => true,

        ]);

        /*
        |--------------------------------------------------------------------------
        | BUAT PASSWORD BARU
        |--------------------------------------------------------------------------
        */

        return view('auth.create-password', [

            'user' => $user

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | BUAT PASSWORD PERTAMA
    |--------------------------------------------------------------------------
    */

    public function createPassword(Request $request)
    {
        $request->validate([

            'USERNAME' => 'required',

            'PASSWORD' => 'required|min:4|confirmed',

        ]);

        /*
        |--------------------------------------------------------------------------
        | CARI USER
        |--------------------------------------------------------------------------
        */

        $user = User::where(
            'USERNAME',
            $request->USERNAME
        )->first();

        /*
        |--------------------------------------------------------------------------
        | USER TIDAK ADA
        |--------------------------------------------------------------------------
        */

        if (!$user) {

            return redirect('/login')
                ->with(
                    'error',
                    'User tidak ditemukan'
                );

        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN PASSWORD BARU
        |--------------------------------------------------------------------------
        */

        $user->update([

            'PASSWORD' => Hash::make(
                $request->PASSWORD
            ),

        ]);

        /*
        |--------------------------------------------------------------------------
        | LOGIN OTOMATIS
        |--------------------------------------------------------------------------
        */

        Auth::login($user);

        $request->session()->regenerate();

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect('/user');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGIN DENGAN PASSWORD
    |--------------------------------------------------------------------------
    */

    public function authenticate(Request $request)
    {
        $request->validate([

            'USERNAME' => 'required',

            'PASSWORD' => 'required',

        ]);

        /*
        |--------------------------------------------------------------------------
        | CARI USER
        |--------------------------------------------------------------------------
        */

        $user = User::where(
            'USERNAME',
            $request->USERNAME
        )->first();

        /*
        |--------------------------------------------------------------------------
        | USER TIDAK DITEMUKAN
        |--------------------------------------------------------------------------
        */

        if (!$user) {

            return back()->with(
                'error',
                'User tidak ditemukan'
            );

        }

        /*
        |--------------------------------------------------------------------------
        | PASSWORD SALAH
        |--------------------------------------------------------------------------
        */

        if (!Hash::check(
            $request->PASSWORD,
            $user->PASSWORD
        )) {

            return back()->with(
                'error',
                'Password salah'
            );

        }

        /*
        |--------------------------------------------------------------------------
        | LOGIN
        |--------------------------------------------------------------------------
        */

        Auth::login($user);

        $request->session()->regenerate();

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        if ($user->ROLE === 'admin') {

            return redirect('/dashboard');

        }

        return redirect('/user');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
