<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST Ruangan
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $rooms = Room::orderBy(
            'NAME'
        )->get();

        return view(
            'ruangan.index',
            compact('rooms')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN Ruangan
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'NAME' => 'required',

            'LATITUDE' => 'required',

            'LONGITUDE' => 'required',

            'RADIUS' => 'required|integer'

        ]);

        Room::create([

            'NAME' => $request->NAME,

            'LATITUDE' => $request->LATITUDE,

            'LONGITUDE' => $request->LONGITUDE,

            'RADIUS' => $request->RADIUS

        ]);

        return back()->with(
            'success',
            'Ruangan berhasil ditambahkan'
        );
    }
}
