<?php

namespace App\Http\Controllers;

use App\Models\ROOM;
use Illuminate\Http\Request;
use App\Services\GeoFenceService;

class AbsensiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ABSENSI
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return view('absensi.index');
    }

    /*
    |--------------------------------------------------------------------------
    | CHECK GEOFENCE
    |--------------------------------------------------------------------------
    */

    public function checkGeofence(Request $request)
    {
        $request->validate([

            'LATITUDE'  => 'required|numeric',

            'LONGITUDE' => 'required|numeric',

            'ACCURACY'  => 'nullable|numeric',

        ]);

        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA RUANGAN
        |--------------------------------------------------------------------------
        */

        $room = ROOM::first();

        if (!$room) {

            return response()->json([

                'inside'   => false,

                'distance' => 0,

                'message'  => 'Ruangan belum dikonfigurasi'

            ], 404);

        }

        /*
        |--------------------------------------------------------------------------
        | VALIDASI AKURASI GPS
        |--------------------------------------------------------------------------
        */

        if (
            $request->ACCURACY &&
            $request->ACCURACY > 50
        ) {

            return response()->json([

                'inside'   => false,

                'distance' => 0,

                'message'  => 'GPS tidak akurat'

            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | HITUNG GEOFENCE
        |--------------------------------------------------------------------------
        */

        $result = GeoFenceService::isInside(

            $request->LATITUDE,

            $request->LONGITUDE,

            $room->LATITUDE,

            $room->LONGITUDE,

            $room->RADIUS_METER

        );

        /*
        |--------------------------------------------------------------------------
        | RESPONSE
        |--------------------------------------------------------------------------
        */

        return response()->json([

            'inside'   => $result['inside'],

            'distance' => round(
                $result['distance'],
                2
            ),

            'message'  => $result['inside']
                ? 'Dalam Radius'
                : 'Diluar Radius'

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | ABSEN MASUK
    |--------------------------------------------------------------------------
    */

    public function absenMasuk(Request $request)
    {
        //
    }

    /*
    |--------------------------------------------------------------------------
    | ABSEN KELUAR
    |--------------------------------------------------------------------------
    */

    public function absenKeluar(Request $request)
    {
        //
    }
}
